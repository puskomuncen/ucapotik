<?php

namespace PHPMaker2025\apotik2025baru;

/**
 * User levels
 *
 * @var array<int, string, string>
 * [0] int User level ID
 * [1] string User level name
 * [2] string User level hierarchy
 */
$USER_LEVELS = [["-2","Anonymous",""],
    ["0","Default",""]];

/**
 * User roles
 *
 * @var array<int, string>
 * [0] int User level ID
 * [1] string User role name
 */
$USER_ROLES = [["-1","ROLE_ADMIN"],
    ["0","ROLE_DEFAULT"]];

/**
 * User level permissions
 *
 * @var array<string, int, int>
 * [0] string Project ID + Table name
 * [1] int User level ID
 * [2] int Permissions
 */
// Begin of modification by Masino Sinaga, September 17, 2023
$USER_LEVEL_PRIVS_1 = [["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}announcement","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}announcement","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}help","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}help","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}help_categories","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}help_categories","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}home.php","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}home.php","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}languages","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}languages","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}settings","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}settings","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}theuserprofile","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}theuserprofile","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}userlevelpermissions","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}userlevelpermissions","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}userlevels","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}userlevels","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}users","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}users","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}detail_resep","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}detail_resep","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}dokter","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}dokter","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}jadwal_praktek","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}jadwal_praktek","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}kunjungan","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}kunjungan","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}obat","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}obat","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}pasien","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}pasien","0","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}transaksi","-2","0"],
    ["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}transaksi","0","0"]];
$USER_LEVEL_PRIVS_2 = [["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}breadcrumblinksaddsp","-1","8"],
					["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}breadcrumblinkschecksp","-1","8"],
					["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}breadcrumblinksdeletesp","-1","8"],
					["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}breadcrumblinksmovesp","-1","8"],
					["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}loadhelponline","-2","8"],
					["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}loadaboutus","-2","8"],
					["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}loadtermsconditions","-2","8"],
					["{9F983EFE-F142-4391-B95A-B5DA22E21EEB}printtermsconditions","-2","8"]];
$USER_LEVEL_PRIVS = array_merge($USER_LEVEL_PRIVS_1, $USER_LEVEL_PRIVS_2);
// End of modification by Masino Sinaga, September 17, 2023

/**
 * Tables
 *
 * @var array<string, string, string, bool, string>
 * [0] string Table name
 * [1] string Table variable name
 * [2] string Table caption
 * [3] bool Allowed for update (for userpriv.php)
 * [4] string Project ID
 * [5] string URL (for OthersController::index)
 */
// Begin of modification by Masino Sinaga, September 17, 2023
$USER_LEVEL_TABLES_1 = [["announcement","announcement","Announcement",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","announcementlist"],
    ["help","help","Help (Details)",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","helplist"],
    ["help_categories","help_categories","Help (Categories)",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","helpcategorieslist"],
    ["home.php","home","Home",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","home"],
    ["languages","languages","Languages",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","languageslist"],
    ["settings","settings","Application Settings",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","settingslist"],
    ["theuserprofile","theuserprofile","User Profile",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","theuserprofilelist"],
    ["userlevelpermissions","userlevelpermissions","User Level Permissions",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","userlevelpermissionslist"],
    ["userlevels","userlevels","User Levels",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","userlevelslist"],
    ["users","users","Users",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","userslist"],
    ["detail_resep","detail_resep","detail resep",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","detailreseplist"],
    ["dokter","dokter","dokter",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","dokterlist"],
    ["jadwal_praktek","jadwal_praktek","jadwal praktek",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","jadwalprakteklist"],
    ["kunjungan","kunjungan","kunjungan",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","kunjunganlist"],
    ["obat","obat","obat",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","obatlist"],
    ["pasien","pasien","pasien",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","pasienlist"],
    ["transaksi","transaksi","transaksi",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","transaksilist"]];
$USER_LEVEL_TABLES_2 = [["breadcrumblinksaddsp","breadcrumblinksaddsp","System - Breadcrumb Links - Add",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","breadcrumblinksaddsp"],
						["breadcrumblinkschecksp","breadcrumblinkschecksp","System - Breadcrumb Links - Check",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","breadcrumblinkschecksp"],
						["breadcrumblinksdeletesp","breadcrumblinksdeletesp","System - Breadcrumb Links - Delete",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","breadcrumblinksdeletesp"],
						["breadcrumblinksmovesp","breadcrumblinksmovesp","System - Breadcrumb Links - Move",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","breadcrumblinksmovesp"],
						["loadhelponline","loadhelponline","System - Load Help Online",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","loadhelponline"],
						["loadaboutus","loadaboutus","System - Load About Us",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","loadaboutus"],
						["loadtermsconditions","loadtermsconditions","System - Load Terms and Conditions",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","loadtermsconditions"],
						["printtermsconditions","printtermsconditions","System - Print Terms and Conditions",true,"{9F983EFE-F142-4391-B95A-B5DA22E21EEB}","printtermsconditions"]];
$USER_LEVEL_TABLES = array_merge($USER_LEVEL_TABLES_1, $USER_LEVEL_TABLES_2);
// End of modification by Masino Sinaga, September 17, 2023
