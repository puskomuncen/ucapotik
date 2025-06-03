<?php

namespace PHPMaker2025\apotik2025baru;

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(4, "mi_home", $Language->menuPhrase("4", "MenuText"), "home", -1, substr("mi_home", strpos("mi_home", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}home.php'), false, false, "fa-home", "", false, true);
$sideMenu->addMenuItem(40, "mci_Master", $Language->menuPhrase("40", "MenuText"), "", -1, substr("mci_Master", strpos("mci_Master", "mi_") + 3), true, false, true, "fa-file", "", false, true);
$sideMenu->addMenuItem(46, "mi_pasien", $Language->menuPhrase("46", "MenuText"), "pasienlist", 40, substr("mi_pasien", strpos("mi_pasien", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}pasien'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(42, "mi_dokter", $Language->menuPhrase("42", "MenuText"), "dokterlist", 40, substr("mi_dokter", strpos("mi_dokter", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}dokter'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(45, "mi_obat", $Language->menuPhrase("45", "MenuText"), "obatlist", 40, substr("mi_obat", strpos("mi_obat", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}obat'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(43, "mi_jadwal_praktek", $Language->menuPhrase("43", "MenuText"), "jadwalprakteklist", 40, substr("mi_jadwal_praktek", strpos("mi_jadwal_praktek", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}jadwal_praktek'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(39, "mci_Data", $Language->menuPhrase("39", "MenuText"), "", -1, substr("mci_Data", strpos("mci_Data", "mi_") + 3), true, false, true, "fa-file", "", false, true);
$sideMenu->addMenuItem(44, "mi_kunjungan", $Language->menuPhrase("44", "MenuText"), "kunjunganlist", 39, substr("mi_kunjungan", strpos("mi_kunjungan", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}kunjungan'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(41, "mi_detail_resep", $Language->menuPhrase("41", "MenuText"), "detailreseplist", 39, substr("mi_detail_resep", strpos("mi_detail_resep", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}detail_resep'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(47, "mi_transaksi", $Language->menuPhrase("47", "MenuText"), "transaksilist", 39, substr("mi_transaksi", strpos("mi_transaksi", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}transaksi'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(16, "mi_theuserprofile", $Language->menuPhrase("16", "MenuText"), "theuserprofilelist", -1, substr("mi_theuserprofile", strpos("mi_theuserprofile", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}theuserprofile'), false, false, "fa-user", "", false, true);
$sideMenu->addMenuItem(5, "mi_help_categories", $Language->menuPhrase("5", "MenuText"), "helpcategorieslist", -1, substr("mi_help_categories", strpos("mi_help_categories", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}help_categories'), false, false, "fa-book", "", false, true);
$sideMenu->addMenuItem(6, "mi_help", $Language->menuPhrase("6", "MenuText"), "helplist?cmd=resetall", 5, substr("mi_help", strpos("mi_help", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}help'), false, false, "fa-book", "", false, true);
$sideMenu->addMenuItem(13, "mci_Terms_and_Condition", $Language->menuPhrase("13", "MenuText"), "javascript:void(0);|||getTermsConditions();return false;", 5, substr("mci_Terms_and_Condition", strpos("mci_Terms_and_Condition", "mi_") + 3), true, false, true, "fas fa-cannabis", "", false, true);
$sideMenu->addMenuItem(14, "mci_About_Us", $Language->menuPhrase("14", "MenuText"), "javascript:void(0);|||getAboutUs();return false;", 5, substr("mci_About_Us", strpos("mci_About_Us", "mi_") + 3), true, false, true, "fa-question", "", false, true);
$sideMenu->addMenuItem(12, "mci_ADMIN", $Language->menuPhrase("12", "MenuText"), "", -1, substr("mci_ADMIN", strpos("mci_ADMIN", "mi_") + 3), true, false, true, "fa-key", "", false, true);
$sideMenu->addMenuItem(1, "mi_users", $Language->menuPhrase("1", "MenuText"), "userslist?cmd=resetall", 12, substr("mi_users", strpos("mi_users", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}users'), false, false, "fa-user", "", false, true);
$sideMenu->addMenuItem(3, "mi_userlevels", $Language->menuPhrase("3", "MenuText"), "userlevelslist", 12, substr("mi_userlevels", strpos("mi_userlevels", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}userlevels'), false, false, "fa-tags", "", false, true);
$sideMenu->addMenuItem(2, "mi_userlevelpermissions", $Language->menuPhrase("2", "MenuText"), "userlevelpermissionslist", 12, substr("mi_userlevelpermissions", strpos("mi_userlevelpermissions", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}userlevelpermissions'), false, false, "fa-file", "", false, true);
$sideMenu->addMenuItem(8, "mi_settings", $Language->menuPhrase("8", "MenuText"), "settingslist", 12, substr("mi_settings", strpos("mi_settings", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}settings'), false, false, "fa-tools", "", false, true);
$sideMenu->addMenuItem(7, "mi_languages", $Language->menuPhrase("7", "MenuText"), "languageslist", 12, substr("mi_languages", strpos("mi_languages", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}languages'), false, false, "fa-flag", "", false, true);
$sideMenu->addMenuItem(15, "mi_announcement", $Language->menuPhrase("15", "MenuText"), "announcementlist", 12, substr("mi_announcement", strpos("mi_announcement", "mi_") + 3), AllowListMenu('{9F983EFE-F142-4391-B95A-B5DA22E21EEB}announcement'), false, false, "fas fa-bullhorn", "", false, true);
echo $sideMenu->toScript();
