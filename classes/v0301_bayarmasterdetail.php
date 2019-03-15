<?php
namespace PHPMaker2019\spp_prj;

/**
 * Table class for v0301_bayarmasterdetail
 */
class v0301_bayarmasterdetail extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $bayarmaster_id;
	public $tahunajaran_id;
	public $siswa_id;
	public $Nomor;
	public $Tanggal;
	public $Total;
	public $bayardetail_id;
	public $iuran_id;
	public $Periode1;
	public $Periode2;
	public $Keterangan;
	public $Jumlah;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v0301_bayarmasterdetail';
		$this->TableName = 'v0301_bayarmasterdetail';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v0301_bayarmasterdetail`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// bayarmaster_id
		$this->bayarmaster_id = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_bayarmaster_id', 'bayarmaster_id', '`bayarmaster_id`', '`bayarmaster_id`', 3, -1, FALSE, '`bayarmaster_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->bayarmaster_id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->bayarmaster_id->IsPrimaryKey = TRUE; // Primary key field
		$this->bayarmaster_id->Sortable = TRUE; // Allow sort
		$this->bayarmaster_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['bayarmaster_id'] = &$this->bayarmaster_id;

		// tahunajaran_id
		$this->tahunajaran_id = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_tahunajaran_id', 'tahunajaran_id', '`tahunajaran_id`', '`tahunajaran_id`', 3, -1, FALSE, '`tahunajaran_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->tahunajaran_id->Nullable = FALSE; // NOT NULL field
		$this->tahunajaran_id->Required = TRUE; // Required field
		$this->tahunajaran_id->Sortable = TRUE; // Allow sort
		$this->tahunajaran_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tahunajaran_id'] = &$this->tahunajaran_id;

		// siswa_id
		$this->siswa_id = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_siswa_id', 'siswa_id', '`siswa_id`', '`siswa_id`', 3, -1, FALSE, '`siswa_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->siswa_id->Nullable = FALSE; // NOT NULL field
		$this->siswa_id->Required = TRUE; // Required field
		$this->siswa_id->Sortable = TRUE; // Allow sort
		$this->siswa_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['siswa_id'] = &$this->siswa_id;

		// Nomor
		$this->Nomor = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_Nomor', 'Nomor', '`Nomor`', '`Nomor`', 200, -1, FALSE, '`Nomor`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nomor->Nullable = FALSE; // NOT NULL field
		$this->Nomor->Required = TRUE; // Required field
		$this->Nomor->Sortable = TRUE; // Allow sort
		$this->fields['Nomor'] = &$this->Nomor;

		// Tanggal
		$this->Tanggal = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_Tanggal', 'Tanggal', '`Tanggal`', CastDateFieldForLike('`Tanggal`', 0, "DB"), 133, 0, FALSE, '`Tanggal`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tanggal->Nullable = FALSE; // NOT NULL field
		$this->Tanggal->Required = TRUE; // Required field
		$this->Tanggal->Sortable = TRUE; // Allow sort
		$this->Tanggal->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['Tanggal'] = &$this->Tanggal;

		// Total
		$this->Total = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_Total', 'Total', '`Total`', '`Total`', 4, -1, FALSE, '`Total`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Total->Nullable = FALSE; // NOT NULL field
		$this->Total->Required = TRUE; // Required field
		$this->Total->Sortable = TRUE; // Allow sort
		$this->Total->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Total'] = &$this->Total;

		// bayardetail_id
		$this->bayardetail_id = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_bayardetail_id', 'bayardetail_id', '`bayardetail_id`', '`bayardetail_id`', 3, -1, FALSE, '`bayardetail_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->bayardetail_id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->bayardetail_id->IsPrimaryKey = TRUE; // Primary key field
		$this->bayardetail_id->Sortable = TRUE; // Allow sort
		$this->bayardetail_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['bayardetail_id'] = &$this->bayardetail_id;

		// iuran_id
		$this->iuran_id = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_iuran_id', 'iuran_id', '`iuran_id`', '`iuran_id`', 3, -1, FALSE, '`iuran_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->iuran_id->Sortable = TRUE; // Allow sort
		$this->iuran_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['iuran_id'] = &$this->iuran_id;

		// Periode1
		$this->Periode1 = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_Periode1', 'Periode1', '`Periode1`', '`Periode1`', 200, -1, FALSE, '`Periode1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Periode1->Sortable = TRUE; // Allow sort
		$this->fields['Periode1'] = &$this->Periode1;

		// Periode2
		$this->Periode2 = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_Periode2', 'Periode2', '`Periode2`', '`Periode2`', 200, -1, FALSE, '`Periode2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Periode2->Sortable = TRUE; // Allow sort
		$this->fields['Periode2'] = &$this->Periode2;

		// Keterangan
		$this->Keterangan = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_Keterangan', 'Keterangan', '`Keterangan`', '`Keterangan`', 200, -1, FALSE, '`Keterangan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Keterangan->Sortable = TRUE; // Allow sort
		$this->fields['Keterangan'] = &$this->Keterangan;

		// Jumlah
		$this->Jumlah = new DbField('v0301_bayarmasterdetail', 'v0301_bayarmasterdetail', 'x_Jumlah', 'Jumlah', '`Jumlah`', '`Jumlah`', 4, -1, FALSE, '`Jumlah`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Jumlah->Sortable = TRUE; // Allow sort
		$this->Jumlah->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Jumlah'] = &$this->Jumlah;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Multiple column sort
	public function updateSort(&$fld, $ctrl)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($ctrl) {
				$orderBy = $this->getSessionOrderBy();
				if (ContainsString($orderBy, $sortField . " " . $lastSort)) {
					$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
				} else {
					if ($orderBy <> "")
						$orderBy .= ", ";
					$orderBy .= $sortField . " " . $thisSort;
				}
				$this->setSessionOrderBy($orderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
			}
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`v0301_bayarmasterdetail`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect <> "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere <> "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy <> "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving <> "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy <> "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count
	public function getRecordCount($sql)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery and SELECT DISTINCT
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) && !preg_match('/^\s*select\s+distinct\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = &$this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->bayarmaster_id->setDbValue($conn->insert_ID());
			$rs['bayarmaster_id'] = $this->bayarmaster_id->DbValue;

			// Get insert id if necessary
			$this->bayardetail_id->setDbValue($conn->insert_ID());
			$rs['bayardetail_id'] = $this->bayardetail_id->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsPrimaryKey)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = &$this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('bayarmaster_id', $rs))
				AddFilter($where, QuotedName('bayarmaster_id', $this->Dbid) . '=' . QuotedValue($rs['bayarmaster_id'], $this->bayarmaster_id->DataType, $this->Dbid));
			if (array_key_exists('bayardetail_id', $rs))
				AddFilter($where, QuotedName('bayardetail_id', $this->Dbid) . '=' . QuotedValue($rs['bayardetail_id'], $this->bayardetail_id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = &$this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->bayarmaster_id->DbValue = $row['bayarmaster_id'];
		$this->tahunajaran_id->DbValue = $row['tahunajaran_id'];
		$this->siswa_id->DbValue = $row['siswa_id'];
		$this->Nomor->DbValue = $row['Nomor'];
		$this->Tanggal->DbValue = $row['Tanggal'];
		$this->Total->DbValue = $row['Total'];
		$this->bayardetail_id->DbValue = $row['bayardetail_id'];
		$this->iuran_id->DbValue = $row['iuran_id'];
		$this->Periode1->DbValue = $row['Periode1'];
		$this->Periode2->DbValue = $row['Periode2'];
		$this->Keterangan->DbValue = $row['Keterangan'];
		$this->Jumlah->DbValue = $row['Jumlah'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`bayarmaster_id` = @bayarmaster_id@ AND `bayardetail_id` = @bayardetail_id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('bayarmaster_id', $row) ? $row['bayarmaster_id'] : NULL) : $this->bayarmaster_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@bayarmaster_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		$val = is_array($row) ? (array_key_exists('bayardetail_id', $row) ? $row['bayardetail_id'] : NULL) : $this->bayardetail_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@bayardetail_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") <> "" && ReferPageName() <> CurrentPageName() && ReferPageName() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "v0301_bayarmasterdetaillist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_RETURN_URL] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "v0301_bayarmasterdetailview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v0301_bayarmasterdetailedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v0301_bayarmasterdetailadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v0301_bayarmasterdetaillist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("v0301_bayarmasterdetailview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v0301_bayarmasterdetailview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "v0301_bayarmasterdetailadd.php?" . $this->getUrlParm($parm);
		else
			$url = "v0301_bayarmasterdetailadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v0301_bayarmasterdetailedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("v0301_bayarmasterdetailadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("v0301_bayarmasterdetaildelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "bayarmaster_id:" . JsonEncode($this->bayarmaster_id->CurrentValue, "number");
		$json .= ",bayardetail_id:" . JsonEncode($this->bayardetail_id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm <> "")
			$url .= $parm . "&";
		if ($this->bayarmaster_id->CurrentValue != NULL) {
			$url .= "bayarmaster_id=" . urlencode($this->bayarmaster_id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		if ($this->bayardetail_id->CurrentValue != NULL) {
			$url .= "&bayardetail_id=" . urlencode($this->bayardetail_id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode($COMPOSITE_KEY_SEPARATOR, $arKeys[$i]);
		} else {
			if (Param("bayarmaster_id") !== NULL)
				$arKey[] = Param("bayarmaster_id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("bayardetail_id") !== NULL)
				$arKey[] = Param("bayardetail_id");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) <> 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // bayarmaster_id
					continue;
				if (!is_numeric($key[1])) // bayardetail_id
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys()
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter <> "") $keyFilter .= " OR ";
			$this->bayarmaster_id->CurrentValue = $key[0];
			$this->bayardetail_id->CurrentValue = $key[1];
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = &$this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->bayarmaster_id->setDbValue($rs->fields('bayarmaster_id'));
		$this->tahunajaran_id->setDbValue($rs->fields('tahunajaran_id'));
		$this->siswa_id->setDbValue($rs->fields('siswa_id'));
		$this->Nomor->setDbValue($rs->fields('Nomor'));
		$this->Tanggal->setDbValue($rs->fields('Tanggal'));
		$this->Total->setDbValue($rs->fields('Total'));
		$this->bayardetail_id->setDbValue($rs->fields('bayardetail_id'));
		$this->iuran_id->setDbValue($rs->fields('iuran_id'));
		$this->Periode1->setDbValue($rs->fields('Periode1'));
		$this->Periode2->setDbValue($rs->fields('Periode2'));
		$this->Keterangan->setDbValue($rs->fields('Keterangan'));
		$this->Jumlah->setDbValue($rs->fields('Jumlah'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// bayarmaster_id
		// tahunajaran_id
		// siswa_id
		// Nomor
		// Tanggal
		// Total
		// bayardetail_id
		// iuran_id
		// Periode1
		// Periode2
		// Keterangan
		// Jumlah
		// bayarmaster_id

		$this->bayarmaster_id->ViewValue = $this->bayarmaster_id->CurrentValue;
		$this->bayarmaster_id->ViewCustomAttributes = "";

		// tahunajaran_id
		$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->CurrentValue;
		$this->tahunajaran_id->ViewValue = FormatNumber($this->tahunajaran_id->ViewValue, 0, -2, -2, -2);
		$this->tahunajaran_id->ViewCustomAttributes = "";

		// siswa_id
		$this->siswa_id->ViewValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->ViewValue = FormatNumber($this->siswa_id->ViewValue, 0, -2, -2, -2);
		$this->siswa_id->ViewCustomAttributes = "";

		// Nomor
		$this->Nomor->ViewValue = $this->Nomor->CurrentValue;
		$this->Nomor->ViewCustomAttributes = "";

		// Tanggal
		$this->Tanggal->ViewValue = $this->Tanggal->CurrentValue;
		$this->Tanggal->ViewValue = FormatDateTime($this->Tanggal->ViewValue, 0);
		$this->Tanggal->ViewCustomAttributes = "";

		// Total
		$this->Total->ViewValue = $this->Total->CurrentValue;
		$this->Total->ViewValue = FormatNumber($this->Total->ViewValue, 2, -2, -2, -2);
		$this->Total->ViewCustomAttributes = "";

		// bayardetail_id
		$this->bayardetail_id->ViewValue = $this->bayardetail_id->CurrentValue;
		$this->bayardetail_id->ViewCustomAttributes = "";

		// iuran_id
		$this->iuran_id->ViewValue = $this->iuran_id->CurrentValue;
		$this->iuran_id->ViewValue = FormatNumber($this->iuran_id->ViewValue, 0, -2, -2, -2);
		$this->iuran_id->ViewCustomAttributes = "";

		// Periode1
		$this->Periode1->ViewValue = $this->Periode1->CurrentValue;
		$this->Periode1->ViewCustomAttributes = "";

		// Periode2
		$this->Periode2->ViewValue = $this->Periode2->CurrentValue;
		$this->Periode2->ViewCustomAttributes = "";

		// Keterangan
		$this->Keterangan->ViewValue = $this->Keterangan->CurrentValue;
		$this->Keterangan->ViewCustomAttributes = "";

		// Jumlah
		$this->Jumlah->ViewValue = $this->Jumlah->CurrentValue;
		$this->Jumlah->ViewValue = FormatNumber($this->Jumlah->ViewValue, 2, -2, -2, -2);
		$this->Jumlah->ViewCustomAttributes = "";

		// bayarmaster_id
		$this->bayarmaster_id->LinkCustomAttributes = "";
		$this->bayarmaster_id->HrefValue = "";
		$this->bayarmaster_id->TooltipValue = "";

		// tahunajaran_id
		$this->tahunajaran_id->LinkCustomAttributes = "";
		$this->tahunajaran_id->HrefValue = "";
		$this->tahunajaran_id->TooltipValue = "";

		// siswa_id
		$this->siswa_id->LinkCustomAttributes = "";
		$this->siswa_id->HrefValue = "";
		$this->siswa_id->TooltipValue = "";

		// Nomor
		$this->Nomor->LinkCustomAttributes = "";
		$this->Nomor->HrefValue = "";
		$this->Nomor->TooltipValue = "";

		// Tanggal
		$this->Tanggal->LinkCustomAttributes = "";
		$this->Tanggal->HrefValue = "";
		$this->Tanggal->TooltipValue = "";

		// Total
		$this->Total->LinkCustomAttributes = "";
		$this->Total->HrefValue = "";
		$this->Total->TooltipValue = "";

		// bayardetail_id
		$this->bayardetail_id->LinkCustomAttributes = "";
		$this->bayardetail_id->HrefValue = "";
		$this->bayardetail_id->TooltipValue = "";

		// iuran_id
		$this->iuran_id->LinkCustomAttributes = "";
		$this->iuran_id->HrefValue = "";
		$this->iuran_id->TooltipValue = "";

		// Periode1
		$this->Periode1->LinkCustomAttributes = "";
		$this->Periode1->HrefValue = "";
		$this->Periode1->TooltipValue = "";

		// Periode2
		$this->Periode2->LinkCustomAttributes = "";
		$this->Periode2->HrefValue = "";
		$this->Periode2->TooltipValue = "";

		// Keterangan
		$this->Keterangan->LinkCustomAttributes = "";
		$this->Keterangan->HrefValue = "";
		$this->Keterangan->TooltipValue = "";

		// Jumlah
		$this->Jumlah->LinkCustomAttributes = "";
		$this->Jumlah->HrefValue = "";
		$this->Jumlah->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// bayarmaster_id
		$this->bayarmaster_id->EditAttrs["class"] = "form-control";
		$this->bayarmaster_id->EditCustomAttributes = "";
		$this->bayarmaster_id->EditValue = $this->bayarmaster_id->CurrentValue;
		$this->bayarmaster_id->ViewCustomAttributes = "";

		// tahunajaran_id
		$this->tahunajaran_id->EditAttrs["class"] = "form-control";
		$this->tahunajaran_id->EditCustomAttributes = "";
		$this->tahunajaran_id->EditValue = $this->tahunajaran_id->CurrentValue;
		$this->tahunajaran_id->PlaceHolder = RemoveHtml($this->tahunajaran_id->caption());

		// siswa_id
		$this->siswa_id->EditAttrs["class"] = "form-control";
		$this->siswa_id->EditCustomAttributes = "";
		$this->siswa_id->EditValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->PlaceHolder = RemoveHtml($this->siswa_id->caption());

		// Nomor
		$this->Nomor->EditAttrs["class"] = "form-control";
		$this->Nomor->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Nomor->CurrentValue = HtmlDecode($this->Nomor->CurrentValue);
		$this->Nomor->EditValue = $this->Nomor->CurrentValue;
		$this->Nomor->PlaceHolder = RemoveHtml($this->Nomor->caption());

		// Tanggal
		$this->Tanggal->EditAttrs["class"] = "form-control";
		$this->Tanggal->EditCustomAttributes = "";
		$this->Tanggal->EditValue = FormatDateTime($this->Tanggal->CurrentValue, 8);
		$this->Tanggal->PlaceHolder = RemoveHtml($this->Tanggal->caption());

		// Total
		$this->Total->EditAttrs["class"] = "form-control";
		$this->Total->EditCustomAttributes = "";
		$this->Total->EditValue = $this->Total->CurrentValue;
		$this->Total->PlaceHolder = RemoveHtml($this->Total->caption());
		if (strval($this->Total->EditValue) <> "" && is_numeric($this->Total->EditValue))
			$this->Total->EditValue = FormatNumber($this->Total->EditValue, -2, -2, -2, -2);

		// bayardetail_id
		$this->bayardetail_id->EditAttrs["class"] = "form-control";
		$this->bayardetail_id->EditCustomAttributes = "";
		$this->bayardetail_id->EditValue = $this->bayardetail_id->CurrentValue;
		$this->bayardetail_id->ViewCustomAttributes = "";

		// iuran_id
		$this->iuran_id->EditAttrs["class"] = "form-control";
		$this->iuran_id->EditCustomAttributes = "";
		$this->iuran_id->EditValue = $this->iuran_id->CurrentValue;
		$this->iuran_id->PlaceHolder = RemoveHtml($this->iuran_id->caption());

		// Periode1
		$this->Periode1->EditAttrs["class"] = "form-control";
		$this->Periode1->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Periode1->CurrentValue = HtmlDecode($this->Periode1->CurrentValue);
		$this->Periode1->EditValue = $this->Periode1->CurrentValue;
		$this->Periode1->PlaceHolder = RemoveHtml($this->Periode1->caption());

		// Periode2
		$this->Periode2->EditAttrs["class"] = "form-control";
		$this->Periode2->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Periode2->CurrentValue = HtmlDecode($this->Periode2->CurrentValue);
		$this->Periode2->EditValue = $this->Periode2->CurrentValue;
		$this->Periode2->PlaceHolder = RemoveHtml($this->Periode2->caption());

		// Keterangan
		$this->Keterangan->EditAttrs["class"] = "form-control";
		$this->Keterangan->EditCustomAttributes = "";
		if (REMOVE_XSS)
			$this->Keterangan->CurrentValue = HtmlDecode($this->Keterangan->CurrentValue);
		$this->Keterangan->EditValue = $this->Keterangan->CurrentValue;
		$this->Keterangan->PlaceHolder = RemoveHtml($this->Keterangan->caption());

		// Jumlah
		$this->Jumlah->EditAttrs["class"] = "form-control";
		$this->Jumlah->EditCustomAttributes = "";
		$this->Jumlah->EditValue = $this->Jumlah->CurrentValue;
		$this->Jumlah->PlaceHolder = RemoveHtml($this->Jumlah->caption());
		if (strval($this->Jumlah->EditValue) <> "" && is_numeric($this->Jumlah->EditValue))
			$this->Jumlah->EditValue = FormatNumber($this->Jumlah->EditValue, -2, -2, -2, -2);

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->bayarmaster_id);
					$doc->exportCaption($this->tahunajaran_id);
					$doc->exportCaption($this->siswa_id);
					$doc->exportCaption($this->Nomor);
					$doc->exportCaption($this->Tanggal);
					$doc->exportCaption($this->Total);
					$doc->exportCaption($this->bayardetail_id);
					$doc->exportCaption($this->iuran_id);
					$doc->exportCaption($this->Periode1);
					$doc->exportCaption($this->Periode2);
					$doc->exportCaption($this->Keterangan);
					$doc->exportCaption($this->Jumlah);
				} else {
					$doc->exportCaption($this->bayarmaster_id);
					$doc->exportCaption($this->tahunajaran_id);
					$doc->exportCaption($this->siswa_id);
					$doc->exportCaption($this->Nomor);
					$doc->exportCaption($this->Tanggal);
					$doc->exportCaption($this->Total);
					$doc->exportCaption($this->bayardetail_id);
					$doc->exportCaption($this->iuran_id);
					$doc->exportCaption($this->Periode1);
					$doc->exportCaption($this->Periode2);
					$doc->exportCaption($this->Keterangan);
					$doc->exportCaption($this->Jumlah);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->bayarmaster_id);
						$doc->exportField($this->tahunajaran_id);
						$doc->exportField($this->siswa_id);
						$doc->exportField($this->Nomor);
						$doc->exportField($this->Tanggal);
						$doc->exportField($this->Total);
						$doc->exportField($this->bayardetail_id);
						$doc->exportField($this->iuran_id);
						$doc->exportField($this->Periode1);
						$doc->exportField($this->Periode2);
						$doc->exportField($this->Keterangan);
						$doc->exportField($this->Jumlah);
					} else {
						$doc->exportField($this->bayarmaster_id);
						$doc->exportField($this->tahunajaran_id);
						$doc->exportField($this->siswa_id);
						$doc->exportField($this->Nomor);
						$doc->exportField($this->Tanggal);
						$doc->exportField($this->Total);
						$doc->exportField($this->bayardetail_id);
						$doc->exportField($this->iuran_id);
						$doc->exportField($this->Periode1);
						$doc->exportField($this->Periode2);
						$doc->exportField($this->Keterangan);
						$doc->exportField($this->Jumlah);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Language, $LANGUAGE_FOLDER, $PROJECT_ID;
		if (!isset($Language))
			$Language = new Language($LANGUAGE_FOLDER, Post("language", ""));
		global $Security, $RequestSecurity;

		// Check token first
		$func = PROJECT_NAMESPACE . "CheckToken";
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($PROJECT_ID . $this->TableName);
					if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
					$validRequest = $Security->canList(); // List permission
					if ($validRequest) {
						$Security->UserID_Loading();
						$Security->loadUserID();
						$Security->UserID_Loaded();
					}
				}
			}
		} else {

			// User profile
			$UserProfile = new UserProfile();

			// Security
			$Security = new AdvancedSecurity();
			if (is_array($RequestSecurity)) // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
			$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel(CurrentProjectID() . $this->TableName);
			$Security->TablePermission_Loaded();
			$validRequest = $Security->canList(); // List permission
		}

		// Reject invalid request
		if (!$validRequest)
			return FALSE;

		// Load lookup parameters
		$distinct = ConvertToBool(Post("distinct"));
		$linkField = Post("linkField");
		$displayFields = Post("displayFields");
		$parentFields = Post("parentFields");
		if (!is_array($parentFields))
			$parentFields = [];
		$childFields = Post("childFields");
		if (!is_array($childFields))
			$childFields = [];
		$filterFields = Post("filterFields");
		if (!is_array($filterFields))
			$filterFields = [];
		$filterFieldVars = Post("filterFieldVars");
		if (!is_array($filterFieldVars))
			$filterFieldVars = [];
		$filterOperators = Post("filterOperators");
		if (!is_array($filterOperators))
			$filterOperators = [];
		$autoFillSourceFields = Post("autoFillSourceFields");
		if (!is_array($autoFillSourceFields))
			$autoFillSourceFields = [];
		$formatAutoFill = FALSE;
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Get("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = AUTO_SUGGEST_MAX_ENTRIES;
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");

		// Selected records from modal, skip parent/filter fields and show all records
		if ($keys !== NULL) {
			$parentFields = [];
			$filterFields = [];
			$filterFieldVars = [];
			$offset = 0;
			$pageSize = 0;
		}

		// Create lookup object and output JSON
		$lookup = new Lookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(LOOKUP_FILTER_VALUE_SEPARATOR, $keys);
			$lookup->FilterValues[] = $keys; // Lookup values
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($filterFields) ? count($filterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect <> "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter <> "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy <> "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson();
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = THUMBNAIL_DEFAULT_WIDTH, $height = THUMBNAIL_DEFAULT_HEIGHT)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>