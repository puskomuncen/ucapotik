<?php

namespace PHPMaker2025\apotik2025baru;

use DI\ContainerBuilder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use Psr\Cache\CacheItemPoolInterface;
use Doctrine\DBAL\ParameterType;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Result;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Cache\QueryCacheProfile;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Dflydev\FigCookies\FigRequestCookies;
use Dflydev\FigCookies\FigResponseCookies;
use Dflydev\FigCookies\SetCookie;
use Slim\Interfaces\RouteCollectorProxyInterface;
use Slim\App;
use League\Flysystem\DirectoryListing;
use League\Flysystem\FilesystemException;
use Closure;
use DateTime;
use DateTimeImmutable;
use DateInterval;
use Exception;
use InvalidArgumentException;

/**
 * Page class
 */
class ObatEdit extends Obat
{
    use MessagesTrait;
    use FormTrait;

    // Page ID
    public string $PageID = "edit";

    // Project ID
    public string $ProjectID = PROJECT_ID;

    // Page object name
    public string $PageObjName = "ObatEdit";

    // View file path
    public ?string $View = null;

    // Title
    public ?string $Title = null; // Title for <title> tag

    // CSS class/style
    public string $CurrentPageName = "obatedit";

    // Page headings
    public string $Heading = "";
    public string $Subheading = "";
    public string $PageHeader = "";
    public string $PageFooter = "";

    // Page layout
    public bool $UseLayout = true;

    // Page terminated
    private bool $terminated = false;

    // Page heading
    public function pageHeading(): string
    {
        if ($this->Heading != "") {
            return $this->Heading;
        }
        if (method_exists($this, "tableCaption")) {
            return $this->tableCaption();
        }
        return "";
    }

    // Page subheading
    public function pageSubheading(): string
    {
        if ($this->Subheading != "") {
            return $this->Subheading;
        }
        if ($this->TableName) {
            return Language()->phrase($this->PageID);
        }
        return "";
    }

    // Page name
    public function pageName(): string
    {
        return CurrentPageName();
    }

    // Page URL
    public function pageUrl(bool $withArgs = true): string
    {
        $route = GetRoute();
        $args = RemoveXss($route->getArguments());
        if (!$withArgs) {
            foreach ($args as $key => &$val) {
                $val = "";
            }
            unset($val);
        }
        return rtrim(UrlFor($route->getName(), $args), "/") . "?";
    }

    // Show Page Header
    public function showPageHeader(): void
    {
        $header = $this->PageHeader;
        $this->pageDataRendering($header);
        if ($header != "") { // Header exists, display
            echo '<div id="ew-page-header">' . $header . '</div>';
        }
    }

    // Show Page Footer
    public function showPageFooter(): void
    {
        $footer = $this->PageFooter;
        $this->pageDataRendered($footer);
        if ($footer != "") { // Footer exists, display
            echo '<div id="ew-page-footer">' . $footer . '</div>';
        }
    }

    // Set field visibility
    public function setVisibility(): void
    {
        $this->id_obat->setVisibility();
        $this->nama_obat->setVisibility();
        $this->kategori->setVisibility();
        $this->harga->setVisibility();
        $this->stok->setVisibility();
        $this->expired_date->setVisibility();
        $this->satuan->setVisibility();
    }

    // Constructor
    public function __construct(Language $language, AdvancedSecurity $security)
    {
        parent::__construct($language, $security);
        global $DashboardReport;
        $this->TableVar = 'obat';
        $this->TableName = 'obat';

        // Table CSS class
        $this->TableClass = "table table-striped table-bordered table-hover table-sm ew-desktop-table ew-edit-table";

        // Initialize
        $GLOBALS["Page"] = &$this;

        // Save if user language changed
        if (Param("language") !== null) {
            Profile()->setLanguageId(Param("language"))->saveToStorage();
        }

        // Table object (obat)
        if (!isset($GLOBALS["obat"]) || $GLOBALS["obat"]::class == PROJECT_NAMESPACE . "obat") {
            $GLOBALS["obat"] = &$this;
        }

        // Table name (for backward compatibility only)
        if (!defined(PROJECT_NAMESPACE . "TABLE_NAME")) {
            define(PROJECT_NAMESPACE . "TABLE_NAME", 'obat');
        }

        // Open connection
        $GLOBALS["Conn"] ??= $this->getConnection();
    }

    // Is lookup
    public function isLookup(): bool
    {
        return SameText(Route(0), Config("API_LOOKUP_ACTION"));
    }

    // Is AutoFill
    public function isAutoFill(): bool
    {
        return $this->isLookup() && SameText(Post("ajax"), "autofill");
    }

    // Is AutoSuggest
    public function isAutoSuggest(): bool
    {
        return $this->isLookup() && SameText(Post("ajax"), "autosuggest");
    }

    // Is modal lookup
    public function isModalLookup(): bool
    {
        return $this->isLookup() && SameText(Post("ajax"), "modal");
    }

    // Is terminated
    public function isTerminated(): bool
    {
        return $this->terminated;
    }

    /**
     * Terminate page
     *
     * @param string|bool $url URL for direction, true => show response for API
     * @return void
     */
    public function terminate(string|bool $url = ""): void
    {
        if ($this->terminated) {
            return;
        }
        global $TempImages, $DashboardReport, $Response;

        // Page is terminated
        $this->terminated = true;

        // Page Unload event
        if (method_exists($this, "pageUnload")) {
            $this->pageUnload();
        }
        DispatchEvent(new PageUnloadedEvent($this), PageUnloadedEvent::NAME);
        if (!IsApi() && method_exists($this, "pageRedirecting")) {
            $this->pageRedirecting($url);
        }

        // Return for API
        if (IsApi()) {
            $res = $url === true;
            if (!$res) { // Show response for API
                $ar = array_merge($this->getMessages(), $url ? ["url" => GetUrl($url)] : []);
                WriteJson($ar);
            }
            $this->clearMessages(); // Clear messages for API request
            return;
        } else { // Check if response is JSON
            if (HasJsonResponse()) { // Has JSON response
                $this->clearMessages();
                return;
            }
        }

        // Go to URL if specified
        if ($url != "") {
            if (!IsDebug() && ob_get_length()) {
                ob_end_clean();
            }

            // Handle modal response
            if ($this->IsModal) { // Show as modal
                $pageName = GetPageName($url);
                $result = ["url" => GetUrl($url), "modal" => "1"];  // Assume return to modal for simplicity
                if (
                    SameString($pageName, GetPageName($this->getListUrl()))
                    || SameString($pageName, GetPageName($this->getViewUrl()))
                    || SameString($pageName, GetPageName(CurrentMasterTable()?->getViewUrl() ?? ""))
                ) { // List / View / Master View page
                    if (!SameString($pageName, GetPageName($this->getListUrl()))) { // Not List page
                        $result["caption"] = $this->getModalCaption($pageName);
                        $result["view"] = SameString($pageName, "obatview"); // If View page, no primary button
                    } else { // List page
                        $result["error"] = $this->getFailureMessage(); // List page should not be shown as modal => error
                    }
                } else { // Other pages (add messages and then clear messages)
                    $result = array_merge($this->getMessages(), ["modal" => "1"]);
                    $this->clearMessages();
                }
                WriteJson($result);
            } else {
                Redirect(GetUrl($url));
            }
        }
        return; // Return to controller
    }

    // Get records from result set
    protected function getRecordsFromResult(Result|array $result, bool $current = false): array
    {
        $rows = [];
        if ($result instanceof Result) { // Result
            while ($row = $result->fetchAssociative()) {
                $this->loadRowValues($row); // Set up DbValue/CurrentValue
                $row = $this->getRecordFromArray($row);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        } elseif (is_array($result)) {
            foreach ($result as $ar) {
                $row = $this->getRecordFromArray($ar);
                if ($current) {
                    return $row;
                } else {
                    $rows[] = $row;
                }
            }
        }
        return $rows;
    }

    // Get record from array
    protected function getRecordFromArray(array $ar): array
    {
        $row = [];
        if (is_array($ar)) {
            foreach ($ar as $fldname => $val) {
                if (isset($this->Fields[$fldname]) && ($this->Fields[$fldname]->Visible || $this->Fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
                    $fld = &$this->Fields[$fldname];
                    if ($fld->HtmlTag == "FILE") { // Upload field
                        if (IsEmpty($val)) {
                            $row[$fldname] = null;
                        } else {
                            if ($fld->DataType == DataType::BLOB) {
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))));
                                $row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
                            } elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
                                $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                    "/" . $fld->TableVar . "/" . Encrypt($fld->uploadPath() . $val)));
                                $row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
                            } else { // Multiple files
                                $files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
                                $ar = [];
                                foreach ($files as $file) {
                                    $url = FullUrl(GetApiUrl(Config("API_FILE_ACTION") .
                                        "/" . $fld->TableVar . "/" . Encrypt($fld->uploadPath() . $file)));
                                    if (!IsEmpty($file)) {
                                        $ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
                                    }
                                }
                                $row[$fldname] = $ar;
                            }
                        }
                    } else {
                        $row[$fldname] = $val;
                    }
                }
            }
        }
        return $row;
    }

    // Get record key value from array
    protected function getRecordKeyValue(array $ar): string
    {
        $key = "";
        if (is_array($ar)) {
            $key .= @$ar['id_obat'];
        }
        return $key;
    }

    /**
     * Hide fields for add/edit
     *
     * @return void
     */
    protected function hideFieldsForAddEdit(): void
    {
        if ($this->isAdd() || $this->isCopy() || $this->isGridAdd()) {
            $this->id_obat->Visible = false;
        }
    }

    // Lookup data
    public function lookup(array $req = [], bool $response = true): array|bool
    {
        // Get lookup object
        $fieldName = $req["field"] ?? null;
        if (!$fieldName) {
            return [];
        }
        $fld = $this->Fields[$fieldName];
        $lookup = $fld->Lookup;
        $name = $req["name"] ?? "";
        if (ContainsString($name, "query_builder_rule")) {
            $lookup->FilterFields = []; // Skip parent fields if any
        }

        // Get lookup parameters
        $lookupType = $req["ajax"] ?? "unknown";
        $pageSize = -1;
        $offset = -1;
        $searchValue = "";
        if (SameText($lookupType, "modal") || SameText($lookupType, "filter")) {
            $searchValue = $req["q"] ?? $req["sv"] ?? "";
            $pageSize = $req["n"] ?? $req["recperpage"] ?? 10;
        } elseif (SameText($lookupType, "autosuggest")) {
            $searchValue = $req["q"] ?? "";
            $pageSize = $req["n"] ?? -1;
            $pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
            if ($pageSize <= 0) {
                $pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
            }
        }
        $start = $req["start"] ?? -1;
        $start = is_numeric($start) ? (int)$start : -1;
        $page = $req["page"] ?? -1;
        $page = is_numeric($page) ? (int)$page : -1;
        $offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
        $userSelect = Decrypt($req["s"] ?? "");
        $userFilter = Decrypt($req["f"] ?? "");
        $userOrderBy = Decrypt($req["o"] ?? "");
        $keys = $req["keys"] ?? null;
        $lookup->LookupType = $lookupType; // Lookup type
        $lookup->FilterValues = []; // Clear filter values first
        if ($keys !== null) { // Selected records from modal
            if (is_array($keys)) {
                $keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
            }
            $lookup->FilterFields = []; // Skip parent fields if any
            $lookup->FilterValues[] = $keys; // Lookup values
            $pageSize = -1; // Show all records
        } else { // Lookup values
            $lookup->FilterValues[] = $req["v0"] ?? $req["lookupValue"] ?? "";
        }
        $cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
        for ($i = 1; $i <= $cnt; $i++) {
            $lookup->FilterValues[] = $req["v" . $i] ?? "";
        }
        $lookup->SearchValue = $searchValue;
        $lookup->PageSize = $pageSize;
        $lookup->Offset = $offset;
        if ($userSelect != "") {
            $lookup->UserSelect = $userSelect;
        }
        if ($userFilter != "") {
            $lookup->UserFilter = $userFilter;
        }
        if ($userOrderBy != "") {
            $lookup->UserOrderBy = $userOrderBy;
        }
        return $lookup->toJson($this, $response); // Use settings from current page
    }

    // Properties
    public string $FormClassName = "ew-form ew-edit-form overlay-wrapper";
    public bool $IsModal = false;
    public bool $IsMobileOrModal = false;
    public ?string $DbMasterFilter = "";
    public string $DbDetailFilter = "";
    public ?string $HashValue = null; // Hash Value
    public int $DisplayRecords = 1;
    public int $StartRecord = 0;
    public int $StopRecord = 0;
    public int $TotalRecords = 0;
    public int $RecordRange = 10;
    public int $RecordCount = 0;

    /**
     * Page run
     *
     * @return void
     */
    public function run(): void
    {
        global $ExportType, $SkipHeaderFooter;

// Is modal
        $this->IsModal = IsModal();
        $this->UseLayout = $this->UseLayout && !$this->IsModal;

        // Use layout
        $this->UseLayout = $this->UseLayout && ConvertToBool(Param(Config("PAGE_LAYOUT"), true));

        // View
        $this->View = Get(Config("VIEW"));
        $this->CurrentAction = Param("action"); // Set up current action
        $this->setVisibility();

        // Set lookup cache
        if (!in_array($this->PageID, Config("LOOKUP_CACHE_PAGE_IDS"))) {
            $this->setUseLookupCache(false);
        }

		// Call this new function from userfn*.php file
		My_Global_Check(); // Modified by Masino Sinaga, September 10, 2023

        // Global Page Loading event (in userfn*.php)
        DispatchEvent(new PageLoadingEvent($this), PageLoadingEvent::NAME);

        // Page Load event
        if (method_exists($this, "pageLoad")) {
            $this->pageLoad();
        }

        // Hide fields for add/edit
        if (!$this->UseAjaxActions) {
            $this->hideFieldsForAddEdit();
        }
        // Use inline delete
        if ($this->UseAjaxActions) {
            $this->InlineDelete = true;
        }

		// Begin of Compare Root URL by Masino Sinaga, September 10, 2023
		if (MS_ALWAYS_COMPARE_ROOT_URL == TRUE) {
			if (isset($_SESSION['apotik2025baru_Root_URL'])) {
				if ($_SESSION['apotik2025baru_Root_URL'] == MS_OTHER_COMPARED_ROOT_URL && $_SESSION['apotik2025baru_Root_URL'] <> "") {
					$this->setFailureMessage(str_replace("%s", MS_OTHER_COMPARED_ROOT_URL, Container("language")->phrase("NoPermission")));
					header("Location: " . $_SESSION['apotik2025baru_Root_URL']);
				}
			}
		}
		// End of Compare Root URL by Masino Sinaga, September 10, 2023

        // Check modal
        if ($this->IsModal) {
            $SkipHeaderFooter = true;
        }
        $this->IsMobileOrModal = IsMobile() || $this->IsModal;
        $loaded = false;
        $postBack = false;

        // Set up current action and primary key
        if (IsApi()) {
            // Load key values
            $loaded = true;
            if (($keyValue = Get("id_obat") ?? Key(0) ?? Route(2)) !== null) {
                $this->id_obat->setQueryStringValue($keyValue);
                $this->id_obat->setOldValue($this->id_obat->QueryStringValue);
            } elseif (Post("id_obat") !== null) {
                $this->id_obat->setFormValue(Post("id_obat"));
                $this->id_obat->setOldValue($this->id_obat->FormValue);
            } else {
                $loaded = false; // Unable to load key
            }

            // Load record
            if ($loaded) {
                $loaded = $this->loadRow();
            }
            if (!$loaded) {
                $this->setFailureMessage($this->language->phrase("NoRecord")); // Set no record message
                $this->terminate();
                return;
            }
            $this->CurrentAction = "update"; // Update record directly
            $this->OldKey = $this->getKey(true); // Get from CurrentValue
            $postBack = true;
        } else {
            if (Post("action", "") !== "") {
                $this->CurrentAction = Post("action"); // Get action code
                if (!$this->isShow()) { // Not reload record, handle as postback
                    $postBack = true;
                }

                // Get key from Form
                $this->setKey($this->getOldKey(), $this->isShow());
            } else {
                $this->CurrentAction = "show"; // Default action is display

                // Load key from QueryString
                $loadByQuery = false;
                if (($keyValue = Get("id_obat") ?? Route("id_obat")) !== null) {
                    $this->id_obat->setQueryStringValue($keyValue);
                    $loadByQuery = true;
                } else {
                    $this->id_obat->CurrentValue = null;
                }
            }

            // Load result set
            if ($this->isShow()) {
                    // Load current record
                    $loaded = $this->loadRow();
                $this->OldKey = $loaded ? $this->getKey(true) : ""; // Get from CurrentValue
            }
        }

        // Process form if post back
        if ($postBack) {
            $this->loadFormValues(); // Get form values
        }

        // Validate form if post back
        if ($postBack) {
            if (!$this->validateForm()) {
                $this->EventCancelled = true; // Event cancelled
                $this->restoreFormValues();
                if (IsApi()) {
                    $this->terminate();
                    return;
                } else {
                    $this->CurrentAction = ""; // Form error, reset action
                }
            }
        }

        // Perform current action
        switch ($this->CurrentAction) {
            case "show": // Get a record to display
                    if (!$loaded) { // Load record based on key
                        if (!$this->peekFailureMessage()) {
                            $this->setFailureMessage($this->language->phrase("NoRecord")); // No record found
                        }
                        $this->terminate("obatlist"); // No matching record, return to list
                        return;
                    }
                break;
            case "update": // Update
                $returnUrl = $this->getReturnUrl();
                if (GetPageName($returnUrl) == "obatlist") {
                    $returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
                }
                if ($this->editRow()) { // Update record based on key
                    CleanUploadTempPaths(SessionId());
                    if (!$this->peekSuccessMessage()) {
                        $this->setSuccessMessage($this->language->phrase("UpdateSuccess")); // Update success
                    }

                    // Handle UseAjaxActions with return page
                    if ($this->IsModal && $this->UseAjaxActions) {
                        $this->IsModal = false;
                        if (GetPageName($returnUrl) != "obatlist") {
                            FlashBag()->add("Return-Url", $returnUrl); // Save return URL
                            $returnUrl = "obatlist"; // Return list page content
                        }
                    }
                    if (IsJsonResponse()) {
                        $this->terminate(true);
                        return;
                    } else {
                        $this->terminate($returnUrl); // Return to caller
                        return;
                    }
                } elseif (IsApi()) { // API request, return
                    $this->terminate();
                    return;
                } elseif ($this->IsModal && $this->UseAjaxActions) { // Return JSON error message
                    WriteJson(["success" => false, "validation" => $this->getValidationErrors(), "error" => $this->getFailureMessage()]);
                    $this->terminate();
                    return;
                } elseif (($this->peekFailureMessage()[0] ?? "") == $this->language->phrase("NoRecord")) {
                    $this->terminate($returnUrl); // Return to caller
                    return;
                } else {
                    $this->EventCancelled = true; // Event cancelled
                    $this->restoreFormValues(); // Restore form values if update failed
                }
        }

        // Set up Breadcrumb
        $this->setupBreadcrumb();

        // Render the record
        $this->RowType = RowType::EDIT; // Render as Edit
        $this->resetAttributes();
        $this->renderRow();

        // Set LoginStatus / Page_Rendering / Page_Render
        if (!IsApi() && !$this->isTerminated()) {
            // Setup login status
            SetupLoginStatus();

            // Pass login status to client side
            SetClientVar("login", LoginStatus());

            // Global Page Rendering event (in userfn*.php)
            DispatchEvent(new PageRenderingEvent($this), PageRenderingEvent::NAME);

            // Page Render event
            if (method_exists($this, "pageRender")) {
                $this->pageRender();
            }

            // Render search option
            if (method_exists($this, "renderSearchOptions")) {
                $this->renderSearchOptions();
            }
        }
    }

// Get upload files
    protected function getUploadFiles(): void
    {
    }

    // Load form values
    protected function loadFormValues(): void
    {
        $validate = !Config("SERVER_VALIDATE");

        // Check field name 'id_obat' before field var 'x_id_obat'
        $val = $this->getFormValue("id_obat", null) ?? $this->getFormValue("x_id_obat", null);
        if (!$this->id_obat->IsDetailKey) {
            $this->id_obat->setFormValue($val);
        }

        // Check field name 'nama_obat' before field var 'x_nama_obat'
        $val = $this->getFormValue("nama_obat", null) ?? $this->getFormValue("x_nama_obat", null);
        if (!$this->nama_obat->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->nama_obat->Visible = false; // Disable update for API request
            } else {
                $this->nama_obat->setFormValue($val);
            }
        }

        // Check field name 'kategori' before field var 'x_kategori'
        $val = $this->getFormValue("kategori", null) ?? $this->getFormValue("x_kategori", null);
        if (!$this->kategori->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->kategori->Visible = false; // Disable update for API request
            } else {
                $this->kategori->setFormValue($val);
            }
        }

        // Check field name 'harga' before field var 'x_harga'
        $val = $this->getFormValue("harga", null) ?? $this->getFormValue("x_harga", null);
        if (!$this->harga->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->harga->Visible = false; // Disable update for API request
            } else {
                $this->harga->setFormValue($val, true, $validate);
            }
        }

        // Check field name 'stok' before field var 'x_stok'
        $val = $this->getFormValue("stok", null) ?? $this->getFormValue("x_stok", null);
        if (!$this->stok->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->stok->Visible = false; // Disable update for API request
            } else {
                $this->stok->setFormValue($val, true, $validate);
            }
        }

        // Check field name 'expired_date' before field var 'x_expired_date'
        $val = $this->getFormValue("expired_date", null) ?? $this->getFormValue("x_expired_date", null);
        if (!$this->expired_date->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->expired_date->Visible = false; // Disable update for API request
            } else {
                $this->expired_date->setFormValue($val, true, $validate);
            }
            $this->expired_date->CurrentValue = UnformatDateTime($this->expired_date->CurrentValue, $this->expired_date->formatPattern());
        }

        // Check field name 'satuan' before field var 'x_satuan'
        $val = $this->getFormValue("satuan", null) ?? $this->getFormValue("x_satuan", null);
        if (!$this->satuan->IsDetailKey) {
            if (IsApi() && $val === null) {
                $this->satuan->Visible = false; // Disable update for API request
            } else {
                $this->satuan->setFormValue($val);
            }
        }
    }

    // Restore form values
    public function restoreFormValues(): void
    {
        $this->id_obat->CurrentValue = $this->id_obat->FormValue;
        $this->nama_obat->CurrentValue = $this->nama_obat->FormValue;
        $this->kategori->CurrentValue = $this->kategori->FormValue;
        $this->harga->CurrentValue = $this->harga->FormValue;
        $this->stok->CurrentValue = $this->stok->FormValue;
        $this->expired_date->CurrentValue = $this->expired_date->FormValue;
        $this->expired_date->CurrentValue = UnformatDateTime($this->expired_date->CurrentValue, $this->expired_date->formatPattern());
        $this->satuan->CurrentValue = $this->satuan->FormValue;
    }

    /**
     * Load row based on key values
     *
     * @return bool
     */
    public function loadRow(): bool
    {
        $filter = $this->getRecordFilter();

        // Call Row Selecting event
        $this->rowSelecting($filter);

        // Load SQL based on filter
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $conn = $this->getConnection();
        $res = false;
        $row = $conn->fetchAssociative($sql);
        if ($row) {
            $res = true;
            $this->loadRowValues($row); // Load row values
        }
        return $res;
    }

    /**
     * Load row values from result set or record
     *
     * @param array|bool|null $row Record
     * @return void
     */
    public function loadRowValues(array|bool|null $row = null): void
    {
        $row = is_array($row) ? $row : $this->newRow();

        // Call Row Selected event
        $this->rowSelected($row);
        $this->id_obat->setDbValue($row['id_obat']);
        $this->nama_obat->setDbValue($row['nama_obat']);
        $this->kategori->setDbValue($row['kategori']);
        $this->harga->setDbValue($row['harga']);
        $this->stok->setDbValue($row['stok']);
        $this->expired_date->setDbValue($row['expired_date']);
        $this->satuan->setDbValue($row['satuan']);
    }

    // Return a row with default values
    protected function newRow(): array
    {
        $row = [];
        $row['id_obat'] = $this->id_obat->DefaultValue;
        $row['nama_obat'] = $this->nama_obat->DefaultValue;
        $row['kategori'] = $this->kategori->DefaultValue;
        $row['harga'] = $this->harga->DefaultValue;
        $row['stok'] = $this->stok->DefaultValue;
        $row['expired_date'] = $this->expired_date->DefaultValue;
        $row['satuan'] = $this->satuan->DefaultValue;
        return $row;
    }

    // Load old record
    protected function loadOldRecord(): ?array
    {
        // Load old record
        if ($this->OldKey != "") {
            $this->setKey($this->OldKey);
            $this->CurrentFilter = $this->getRecordFilter();
            $sql = $this->getCurrentSql();
            $conn = $this->getConnection();
            $result = ExecuteQuery($sql, $conn);
            if ($row = $result->fetchAssociative()) {
                $this->loadRowValues($row); // Load row values
                return $row;
            }
        }
        $this->loadRowValues(); // Load default row values
        return null;
    }

    // Render row values based on field settings
    public function renderRow(): void
    {
        global $CurrentLanguage;

        // Initialize URLs

        // Call Row_Rendering event
        $this->rowRendering();

        // Common render codes for all row types

        // id_obat
        $this->id_obat->RowCssClass = "row";

        // nama_obat
        $this->nama_obat->RowCssClass = "row";

        // kategori
        $this->kategori->RowCssClass = "row";

        // harga
        $this->harga->RowCssClass = "row";

        // stok
        $this->stok->RowCssClass = "row";

        // expired_date
        $this->expired_date->RowCssClass = "row";

        // satuan
        $this->satuan->RowCssClass = "row";

        // View row
        if ($this->RowType == RowType::VIEW) {
            // id_obat
            $this->id_obat->ViewValue = $this->id_obat->CurrentValue;

            // nama_obat
            $this->nama_obat->ViewValue = $this->nama_obat->CurrentValue;

            // kategori
            $this->kategori->ViewValue = $this->kategori->CurrentValue;

            // harga
            $this->harga->ViewValue = $this->harga->CurrentValue;
            $this->harga->ViewValue = FormatNumber($this->harga->ViewValue, $this->harga->formatPattern());

            // stok
            $this->stok->ViewValue = $this->stok->CurrentValue;
            $this->stok->ViewValue = FormatNumber($this->stok->ViewValue, $this->stok->formatPattern());

            // expired_date
            $this->expired_date->ViewValue = $this->expired_date->CurrentValue;
            $this->expired_date->ViewValue = FormatDateTime($this->expired_date->ViewValue, $this->expired_date->formatPattern());

            // satuan
            $this->satuan->ViewValue = $this->satuan->CurrentValue;

            // id_obat
            $this->id_obat->HrefValue = "";

            // nama_obat
            $this->nama_obat->HrefValue = "";

            // kategori
            $this->kategori->HrefValue = "";

            // harga
            $this->harga->HrefValue = "";

            // stok
            $this->stok->HrefValue = "";

            // expired_date
            $this->expired_date->HrefValue = "";

            // satuan
            $this->satuan->HrefValue = "";
        } elseif ($this->RowType == RowType::EDIT) {
            // id_obat
            $this->id_obat->setupEditAttributes();
            $this->id_obat->EditValue = $this->id_obat->CurrentValue;

            // nama_obat
            $this->nama_obat->setupEditAttributes();
            $this->nama_obat->EditValue = !$this->nama_obat->Raw ? HtmlDecode($this->nama_obat->CurrentValue) : $this->nama_obat->CurrentValue;
            $this->nama_obat->PlaceHolder = RemoveHtml($this->nama_obat->caption());

            // kategori
            $this->kategori->setupEditAttributes();
            $this->kategori->EditValue = !$this->kategori->Raw ? HtmlDecode($this->kategori->CurrentValue) : $this->kategori->CurrentValue;
            $this->kategori->PlaceHolder = RemoveHtml($this->kategori->caption());

            // harga
            $this->harga->setupEditAttributes();
            $this->harga->EditValue = $this->harga->CurrentValue;
            $this->harga->PlaceHolder = RemoveHtml($this->harga->caption());
            if (strval($this->harga->EditValue) != "" && is_numeric($this->harga->EditValue)) {
                $this->harga->EditValue = FormatNumber($this->harga->EditValue, null);
            }

            // stok
            $this->stok->setupEditAttributes();
            $this->stok->EditValue = $this->stok->CurrentValue;
            $this->stok->PlaceHolder = RemoveHtml($this->stok->caption());
            if (strval($this->stok->EditValue) != "" && is_numeric($this->stok->EditValue)) {
                $this->stok->EditValue = FormatNumber($this->stok->EditValue, null);
            }

            // expired_date
            $this->expired_date->setupEditAttributes();
            $this->expired_date->EditValue = FormatDateTime($this->expired_date->CurrentValue, $this->expired_date->formatPattern());
            $this->expired_date->PlaceHolder = RemoveHtml($this->expired_date->caption());

            // satuan
            $this->satuan->setupEditAttributes();
            $this->satuan->EditValue = !$this->satuan->Raw ? HtmlDecode($this->satuan->CurrentValue) : $this->satuan->CurrentValue;
            $this->satuan->PlaceHolder = RemoveHtml($this->satuan->caption());

            // Edit refer script

            // id_obat
            $this->id_obat->HrefValue = "";

            // nama_obat
            $this->nama_obat->HrefValue = "";

            // kategori
            $this->kategori->HrefValue = "";

            // harga
            $this->harga->HrefValue = "";

            // stok
            $this->stok->HrefValue = "";

            // expired_date
            $this->expired_date->HrefValue = "";

            // satuan
            $this->satuan->HrefValue = "";
        }
        if ($this->RowType == RowType::ADD || $this->RowType == RowType::EDIT || $this->RowType == RowType::SEARCH) { // Add/Edit/Search row
            $this->setupFieldTitles();
        }

        // Call Row Rendered event
        if ($this->RowType != RowType::AGGREGATEINIT) {
            $this->rowRendered();
        }
    }

    // Validate form
    protected function validateForm(): bool
    {
        // Check if validation required
        if (!Config("SERVER_VALIDATE")) {
            return true;
        }
        $validateForm = true;
            if ($this->id_obat->Visible && $this->id_obat->Required) {
                if (!$this->id_obat->IsDetailKey && IsEmpty($this->id_obat->FormValue)) {
                    $this->id_obat->addErrorMessage(str_replace("%s", $this->id_obat->caption(), $this->id_obat->RequiredErrorMessage));
                }
            }
            if ($this->nama_obat->Visible && $this->nama_obat->Required) {
                if (!$this->nama_obat->IsDetailKey && IsEmpty($this->nama_obat->FormValue)) {
                    $this->nama_obat->addErrorMessage(str_replace("%s", $this->nama_obat->caption(), $this->nama_obat->RequiredErrorMessage));
                }
            }
            if ($this->kategori->Visible && $this->kategori->Required) {
                if (!$this->kategori->IsDetailKey && IsEmpty($this->kategori->FormValue)) {
                    $this->kategori->addErrorMessage(str_replace("%s", $this->kategori->caption(), $this->kategori->RequiredErrorMessage));
                }
            }
            if ($this->harga->Visible && $this->harga->Required) {
                if (!$this->harga->IsDetailKey && IsEmpty($this->harga->FormValue)) {
                    $this->harga->addErrorMessage(str_replace("%s", $this->harga->caption(), $this->harga->RequiredErrorMessage));
                }
            }
            if (!CheckNumber($this->harga->FormValue)) {
                $this->harga->addErrorMessage($this->harga->getErrorMessage(false));
            }
            if ($this->stok->Visible && $this->stok->Required) {
                if (!$this->stok->IsDetailKey && IsEmpty($this->stok->FormValue)) {
                    $this->stok->addErrorMessage(str_replace("%s", $this->stok->caption(), $this->stok->RequiredErrorMessage));
                }
            }
            if (!CheckInteger($this->stok->FormValue)) {
                $this->stok->addErrorMessage($this->stok->getErrorMessage(false));
            }
            if ($this->expired_date->Visible && $this->expired_date->Required) {
                if (!$this->expired_date->IsDetailKey && IsEmpty($this->expired_date->FormValue)) {
                    $this->expired_date->addErrorMessage(str_replace("%s", $this->expired_date->caption(), $this->expired_date->RequiredErrorMessage));
                }
            }
            if (!CheckDate($this->expired_date->FormValue, $this->expired_date->formatPattern())) {
                $this->expired_date->addErrorMessage($this->expired_date->getErrorMessage(false));
            }
            if ($this->satuan->Visible && $this->satuan->Required) {
                if (!$this->satuan->IsDetailKey && IsEmpty($this->satuan->FormValue)) {
                    $this->satuan->addErrorMessage(str_replace("%s", $this->satuan->caption(), $this->satuan->RequiredErrorMessage));
                }
            }

        // Return validate result
        $validateForm = $validateForm && !$this->hasInvalidFields();

        // Call Form_CustomValidate event
        $formCustomError = "";
        $validateForm = $validateForm && $this->formCustomValidate($formCustomError);
        if ($formCustomError != "") {
            $this->setFailureMessage($formCustomError);
        }
        return $validateForm;
    }

    // Update record based on key values
    protected function editRow(): bool
    {
        $oldKeyFilter = $this->getRecordFilter();
        $filter = $this->applyUserIDFilters($oldKeyFilter);
        $conn = $this->getConnection();

        // Load old row
        $this->CurrentFilter = $filter;
        $sql = $this->getCurrentSql();
        $oldRow = $conn->fetchAssociative($sql);
        if (!$oldRow) {
            $this->setFailureMessage($this->language->phrase("NoRecord")); // Set no record message
            return false; // Update Failed
        } else {
            // Load old values
            $this->loadDbValues($oldRow);
        }

        // Get new row
        $newRow = $this->getEditRow($oldRow);

        // Update current values
        $this->Fields->setCurrentValues($newRow);

        // Call Row Updating event
        $updateRow = $this->rowUpdating($oldRow, $newRow);
        if ($updateRow) {
            if (count($newRow) > 0) {
                $this->CurrentFilter = $filter; // Set up current filter
                $editRow = $this->update($newRow, "", $oldRow);
                if (!$editRow && !IsEmpty($this->DbErrorMessage)) { // Show database error
                    $this->setFailureMessage($this->DbErrorMessage);
                }
            } else {
                $editRow = true; // No field to update
            }
            if ($editRow) {
            }
        } else {
            if ($this->peekSuccessMessage() || $this->peekFailureMessage()) {
                // Use the message, do nothing
            } elseif ($this->CancelMessage != "") {
                $this->setFailureMessage($this->CancelMessage);
                $this->CancelMessage = "";
            } else {
                $this->setFailureMessage($this->language->phrase("UpdateCancelled"));
            }
            $editRow = $updateRow;
        }

        // Call Row_Updated event
        if ($editRow) {
            $this->rowUpdated($oldRow, $newRow);
        }

        // Write JSON response
        if (IsJsonResponse() && $editRow) {
            $row = $this->getRecordsFromResult([$newRow], true);
            $table = $this->TableVar;
            WriteJson(["success" => true, "action" => Config("API_EDIT_ACTION"), $table => $row]);
        }
        return $editRow;
    }

    /**
     * Get edit row
     *
     * @return array
     */
    protected function getEditRow(array $oldRow): array
    {
        $newRow = [];

        // nama_obat
        $this->nama_obat->setDbValueDef($newRow, $this->nama_obat->CurrentValue, $this->nama_obat->ReadOnly);

        // kategori
        $this->kategori->setDbValueDef($newRow, $this->kategori->CurrentValue, $this->kategori->ReadOnly);

        // harga
        $this->harga->setDbValueDef($newRow, $this->harga->CurrentValue, $this->harga->ReadOnly);

        // stok
        $this->stok->setDbValueDef($newRow, $this->stok->CurrentValue, $this->stok->ReadOnly);

        // expired_date
        $this->expired_date->setDbValueDef($newRow, UnFormatDateTime($this->expired_date->CurrentValue, $this->expired_date->formatPattern()), $this->expired_date->ReadOnly);

        // satuan
        $this->satuan->setDbValueDef($newRow, $this->satuan->CurrentValue, $this->satuan->ReadOnly);
        return $newRow;
    }

    /**
     * Restore edit form from row
     * @param array $row Row
     */
    protected function restoreEditFormFromRow(array $row): void
    {
        if (isset($row['nama_obat'])) { // nama_obat
            $this->nama_obat->CurrentValue = $row['nama_obat'];
        }
        if (isset($row['kategori'])) { // kategori
            $this->kategori->CurrentValue = $row['kategori'];
        }
        if (isset($row['harga'])) { // harga
            $this->harga->CurrentValue = $row['harga'];
        }
        if (isset($row['stok'])) { // stok
            $this->stok->CurrentValue = $row['stok'];
        }
        if (isset($row['expired_date'])) { // expired_date
            $this->expired_date->CurrentValue = $row['expired_date'];
        }
        if (isset($row['satuan'])) { // satuan
            $this->satuan->CurrentValue = $row['satuan'];
        }
    }

    // Set up Breadcrumb
    protected function setupBreadcrumb(): void
    {
        $breadcrumb = Breadcrumb();
        $url = CurrentUrl();
        $breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("obatlist"), "", $this->TableVar, true);
        $pageId = "edit";
        $breadcrumb->add("edit", $pageId, $url);
    }

    // Setup lookup options
    public function setupLookupOptions(DbField $fld): void
    {
        if ($fld->Lookup && $fld->Lookup->Options === null) {
            // Get default connection and filter
            $conn = $this->getConnection();
            $lookupFilter = "";

            // No need to check any more
            $fld->Lookup->Options = [];

            // Set up lookup SQL and connection
            switch ($fld->FieldVar) {
                default:
                    $lookupFilter = "";
                    break;
            }

            // Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
            $qb = $fld->Lookup->getSqlAsQueryBuilder(false, "", $lookupFilter, $this);

            // Set up lookup cache
            if (!$fld->hasLookupOptions() && $fld->UseLookupCache && $qb != null && count($fld->Lookup->Options) == 0 && count($fld->Lookup->FilterFields) == 0) {
                $totalCnt = $this->getRecordCount($qb, $conn);
                if ($totalCnt > $fld->LookupCacheCount) { // Total count > cache count, do not cache
                    return;
                }
                // Get lookup cache Id
                $sql = $qb->getSQL();
                $lookupCacheKey = "lookup.cache." . Container($fld->Lookup->LinkTable)->TableVar . ".";
                $cacheId = $lookupCacheKey . hash("xxh128", $sql); // Hash value of SQL as cache id
                // Prune stale data first
                Container("result.cache")->prune();
                // Use result cache
                $cacheProfile = new QueryCacheProfile(0, $cacheId, Container("result.cache"));
                $rows = $conn->executeCacheQuery($sql, [], [], $cacheProfile)->fetchAllAssociative();
                $ar = [];
                foreach ($rows as $row) {
                    $row = $fld->Lookup->renderViewRow($row);
                    $key = $row["lf"];
                    if (IsFloatType($fld->Type)) { // Handle float field
                        $key = (float)$key;
                    }
                    $ar[strval($key)] = $row;
                }
                $fld->Lookup->Options = $ar;
            }
        }
    }

    // Set up starting record parameters
    public function setupStartRecord(): void
    {
        $pagerTable = Get(Config("TABLE_PAGER_TABLE_NAME"));
        if ($this->DisplayRecords == 0 || $pagerTable && $pagerTable != $this->TableVar) { // Display all records / Check if paging for this table
            return;
        }
        $pageNo = Get(Config("TABLE_PAGE_NUMBER"));
        $startRec = Get(Config("TABLE_START_REC"));
        $infiniteScroll = false;
        $recordNo = $pageNo ?? $startRec; // Record number = page number or start record
        if ($recordNo !== null && is_numeric($recordNo)) {
            $this->StartRecord = $recordNo;
        } else {
            $this->StartRecord = $this->getStartRecordNumber();
        }

        // Check if correct start record counter
        if (!is_numeric($this->StartRecord) || intval($this->StartRecord) <= 0) { // Avoid invalid start record counter
            $this->StartRecord = 1; // Reset start record counter
        } elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
            $this->StartRecord = (int)(($this->TotalRecords - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
        } elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
            $this->StartRecord = (int)(($this->StartRecord - 1) / $this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
        }
        if (!$infiniteScroll) {
            $this->setStartRecordNumber($this->StartRecord);
        }
    }

    // Get page count
    public function pageCount(): int
    {
        return ceil($this->TotalRecords / $this->DisplayRecords);
    }

    // Page Load event
    public function pageLoad(): void
    {
        //Log("Page Load");
    }

    // Page Unload event
    public function pageUnload(): void
    {
        //Log("Page Unload");
    }

    // Page Redirecting event
    public function pageRedirecting(string &$url): void
    {
        // Example:
        //$url = "your URL";
    }

    // Message Showing event
    // $type = ''|'success'|'failure'|'warning'
    public function messageShowing(string &$message, string $type): void
    {
        if ($type == "success") {
            //$message = "your success message";
        } elseif ($type == "failure") {
            //$message = "your failure message";
        } elseif ($type == "warning") {
            //$message = "your warning message";
        } else {
            //$message = "your message";
        }
    }

    // Page Render event
    public function pageRender(): void
    {
        //Log("Page Render");
    }

    // Page Data Rendering event
    public function pageDataRendering(string &$header): void
    {
        // Example:
        //$header = "your header";
    }

    // Page Data Rendered event
    public function pageDataRendered(string &$footer): void
    {
        // Example:
        //$footer = "your footer";
    }

    // Page Breaking event
    public function pageBreaking(bool &$break, string &$content): void
    {
        // Example:
        //$break = false; // Skip page break, or
        //$content = "<div style=\"break-after:page;\"></div>"; // Modify page break content
    }

    // Form Custom Validate event
    public function formCustomValidate(string &$customError): bool
    {
        // Return error message in $customError
        return true;
    }
}
