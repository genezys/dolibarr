<?php
/* Copyright (C) 2005-2012	Laurent Destailleur		<eldy@users.sourceforge.net>
 * Copyright (C) 2007		Rodolphe Quiedeville	<rodolphe@quiedeville.org>
 * Copyright (C) 2007-2012	Regis Houssin			<regis.houssin@capnetworks.com>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

/**
 *  \file       htdocs/admin/system/browser.php
 *  \brief      Page to show Dolibarr informations
 */

require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/memory.lib.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/date.lib.php';

$langs->load("admin");
$langs->load("install");
$langs->load("other");

if (! $user->admin)
	accessforbidden();


/*
 * View
 */

$form=new Form($db);

llxHeader();

print_fiche_titre($langs->trans("InfoBrowser"),'','title_setup');

$tmp=getBrowserInfo($_SERVER["HTTP_USER_AGENT"]);

// Browser
$var=true;
print '<table class="noborder" width="100%">';
print '<tr class="liste_titre"><td>'.$langs->trans("Parameter").'</td><td colspan="2">'.$langs->trans("Value").'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("UserAgent").'</td><td colspan="2">'.$_SERVER['HTTP_USER_AGENT'].'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("BrowserName").'</td><td colspan="2">'.$tmp['browsername'].'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("BrowserOS").'</td><td colspan="2">'.$tmp['browseros'].'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("Version").'</td><td colspan="2">'.$tmp['browserversion'].'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("Layout").' (phone/tablet/classic)</td><td colspan="2">'.$tmp['layout'].'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("IPAddress").'</td><td colspan="2">'.$_SERVER['REMOTE_ADDR'].'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("SessionName").'</td><td colspan="2">'.session_name().'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("SessionId").'</td><td colspan="2">'.session_id().'</td></tr>'."\n";
$var=!$var;
print '<tr '.$bc[$var].'><td width="300">'.$langs->trans("Screen").'</td><td colspan="2">';
print $_SESSION['dol_screenwidth'].' x '.$_SESSION['dol_screenheight'];
print '</td></tr>'."\n";
print '</table>';
print '<br>';



llxFooter();

$db->close();
