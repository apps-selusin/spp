<?php
namespace PHPMaker2019\spp_prj;

/**
 * Table class for t0202_siswaiuran
 */
class t0202_siswaiuran extends DbTable
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

	// Audit trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $tahunajaran_id;
	public $siswa_id;
	public $iuran_id;
	public $Nilai;
	public $Terbayar;
	public $Sisa;
	public $P01;
	public $P02;
	public $P03;
	public $P04;
	public $P05;
	public $P06;
	public $P07;
	public $P08;
	public $P09;
	public $P10;
	public $P11;
	public $P12;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't0202_siswaiuran';
		$this->TableName = 't0202_siswaiuran';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t0202_siswaiuran`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_DEFAULT; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = \PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_A4; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = TRUE; // Allow detail add
		$this->DetailEdit = TRUE; // Allow detail edit
		$this->DetailView = TRUE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_id', 'id', '`id`', '`id`', 3, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// tahunajaran_id
		$this->tahunajaran_id = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_tahunajaran_id', 'tahunajaran_id', '`tahunajaran_id`', '`tahunajaran_id`', 3, -1, FALSE, '`tahunajaran_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->tahunajaran_id->Nullable = FALSE; // NOT NULL field
		$this->tahunajaran_id->Required = TRUE; // Required field
		$this->tahunajaran_id->Sortable = TRUE; // Allow sort
		$this->tahunajaran_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->tahunajaran_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->tahunajaran_id->Lookup = new Lookup('tahunajaran_id', 't0101_tahunajaran', FALSE, 'id', ["TahunAjaran","","",""], [], [], [], [], [], [], '', '');
		$this->tahunajaran_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['tahunajaran_id'] = &$this->tahunajaran_id;

		// siswa_id
		$this->siswa_id = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_siswa_id', 'siswa_id', '`siswa_id`', '`siswa_id`', 3, -1, FALSE, '`siswa_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->siswa_id->IsForeignKey = TRUE; // Foreign key field
		$this->siswa_id->Nullable = FALSE; // NOT NULL field
		$this->siswa_id->Required = TRUE; // Required field
		$this->siswa_id->Sortable = TRUE; // Allow sort
		$this->siswa_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['siswa_id'] = &$this->siswa_id;

		// iuran_id
		$this->iuran_id = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_iuran_id', 'iuran_id', '`iuran_id`', '`iuran_id`', 3, -1, FALSE, '`iuran_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->iuran_id->Nullable = FALSE; // NOT NULL field
		$this->iuran_id->Required = TRUE; // Required field
		$this->iuran_id->Sortable = TRUE; // Allow sort
		$this->iuran_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->iuran_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // PleaseSelect text
		$this->iuran_id->Lookup = new Lookup('iuran_id', 't0106_iuran', FALSE, 'id', ["Iuran","Jenis","",""], [], [], [], [], [], [], '', '');
		$this->iuran_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['iuran_id'] = &$this->iuran_id;

		// Nilai
		$this->Nilai = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_Nilai', 'Nilai', '`Nilai`', '`Nilai`', 4, -1, FALSE, '`Nilai`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nilai->Nullable = FALSE; // NOT NULL field
		$this->Nilai->Required = TRUE; // Required field
		$this->Nilai->Sortable = TRUE; // Allow sort
		$this->Nilai->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Nilai'] = &$this->Nilai;

		// Terbayar
		$this->Terbayar = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_Terbayar', 'Terbayar', '`Terbayar`', '`Terbayar`', 4, -1, FALSE, '`Terbayar`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Terbayar->Nullable = FALSE; // NOT NULL field
		$this->Terbayar->Required = TRUE; // Required field
		$this->Terbayar->Sortable = TRUE; // Allow sort
		$this->Terbayar->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Terbayar'] = &$this->Terbayar;

		// Sisa
		$this->Sisa = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_Sisa', 'Sisa', '`Sisa`', '`Sisa`', 4, -1, FALSE, '`Sisa`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sisa->Nullable = FALSE; // NOT NULL field
		$this->Sisa->Required = TRUE; // Required field
		$this->Sisa->Sortable = TRUE; // Allow sort
		$this->Sisa->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Sisa'] = &$this->Sisa;

		// P01
		$this->P01 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P01', 'P01', '`P01`', '`P01`', 202, -1, FALSE, '`P01`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P01->Nullable = FALSE; // NOT NULL field
		$this->P01->Sortable = TRUE; // Allow sort
		$this->P01->DataType = DATATYPE_BOOLEAN;
		$this->P01->Lookup = new Lookup('P01', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P01->OptionCount = 2;
		$this->fields['P01'] = &$this->P01;

		// P02
		$this->P02 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P02', 'P02', '`P02`', '`P02`', 202, -1, FALSE, '`P02`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P02->Nullable = FALSE; // NOT NULL field
		$this->P02->Sortable = TRUE; // Allow sort
		$this->P02->DataType = DATATYPE_BOOLEAN;
		$this->P02->Lookup = new Lookup('P02', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P02->OptionCount = 2;
		$this->fields['P02'] = &$this->P02;

		// P03
		$this->P03 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P03', 'P03', '`P03`', '`P03`', 202, -1, FALSE, '`P03`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P03->Nullable = FALSE; // NOT NULL field
		$this->P03->Sortable = TRUE; // Allow sort
		$this->P03->DataType = DATATYPE_BOOLEAN;
		$this->P03->Lookup = new Lookup('P03', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P03->OptionCount = 2;
		$this->fields['P03'] = &$this->P03;

		// P04
		$this->P04 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P04', 'P04', '`P04`', '`P04`', 202, -1, FALSE, '`P04`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P04->Nullable = FALSE; // NOT NULL field
		$this->P04->Sortable = TRUE; // Allow sort
		$this->P04->DataType = DATATYPE_BOOLEAN;
		$this->P04->Lookup = new Lookup('P04', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P04->OptionCount = 2;
		$this->fields['P04'] = &$this->P04;

		// P05
		$this->P05 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P05', 'P05', '`P05`', '`P05`', 202, -1, FALSE, '`P05`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P05->Nullable = FALSE; // NOT NULL field
		$this->P05->Sortable = TRUE; // Allow sort
		$this->P05->DataType = DATATYPE_BOOLEAN;
		$this->P05->Lookup = new Lookup('P05', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P05->OptionCount = 2;
		$this->fields['P05'] = &$this->P05;

		// P06
		$this->P06 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P06', 'P06', '`P06`', '`P06`', 202, -1, FALSE, '`P06`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P06->Nullable = FALSE; // NOT NULL field
		$this->P06->Sortable = TRUE; // Allow sort
		$this->P06->DataType = DATATYPE_BOOLEAN;
		$this->P06->Lookup = new Lookup('P06', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P06->OptionCount = 2;
		$this->fields['P06'] = &$this->P06;

		// P07
		$this->P07 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P07', 'P07', '`P07`', '`P07`', 202, -1, FALSE, '`P07`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P07->Nullable = FALSE; // NOT NULL field
		$this->P07->Sortable = TRUE; // Allow sort
		$this->P07->DataType = DATATYPE_BOOLEAN;
		$this->P07->Lookup = new Lookup('P07', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P07->OptionCount = 2;
		$this->fields['P07'] = &$this->P07;

		// P08
		$this->P08 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P08', 'P08', '`P08`', '`P08`', 202, -1, FALSE, '`P08`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P08->Nullable = FALSE; // NOT NULL field
		$this->P08->Sortable = TRUE; // Allow sort
		$this->P08->DataType = DATATYPE_BOOLEAN;
		$this->P08->Lookup = new Lookup('P08', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P08->OptionCount = 2;
		$this->fields['P08'] = &$this->P08;

		// P09
		$this->P09 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P09', 'P09', '`P09`', '`P09`', 202, -1, FALSE, '`P09`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P09->Nullable = FALSE; // NOT NULL field
		$this->P09->Sortable = TRUE; // Allow sort
		$this->P09->DataType = DATATYPE_BOOLEAN;
		$this->P09->Lookup = new Lookup('P09', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P09->OptionCount = 2;
		$this->fields['P09'] = &$this->P09;

		// P10
		$this->P10 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P10', 'P10', '`P10`', '`P10`', 202, -1, FALSE, '`P10`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P10->Nullable = FALSE; // NOT NULL field
		$this->P10->Sortable = TRUE; // Allow sort
		$this->P10->DataType = DATATYPE_BOOLEAN;
		$this->P10->Lookup = new Lookup('P10', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P10->OptionCount = 2;
		$this->fields['P10'] = &$this->P10;

		// P11
		$this->P11 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P11', 'P11', '`P11`', '`P11`', 202, -1, FALSE, '`P11`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P11->Nullable = FALSE; // NOT NULL field
		$this->P11->Sortable = TRUE; // Allow sort
		$this->P11->DataType = DATATYPE_BOOLEAN;
		$this->P11->Lookup = new Lookup('P11', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P11->OptionCount = 2;
		$this->fields['P11'] = &$this->P11;

		// P12
		$this->P12 = new DbField('t0202_siswaiuran', 't0202_siswaiuran', 'x_P12', 'P12', '`P12`', '`P12`', 202, -1, FALSE, '`P12`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->P12->Nullable = FALSE; // NOT NULL field
		$this->P12->Sortable = TRUE; // Allow sort
		$this->P12->DataType = DATATYPE_BOOLEAN;
		$this->P12->Lookup = new Lookup('P12', 't0202_siswaiuran', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->P12->OptionCount = 2;
		$this->fields['P12'] = &$this->P12;
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

	// Current master table name
	public function getCurrentMasterTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE];
	}
	public function setCurrentMasterTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	public function getMasterFilter()
	{

		// Master filter
		$masterFilter = "";
		if ($this->getCurrentMasterTable() == "t0201_siswa") {
			if ($this->siswa_id->getSessionValue() <> "")
				$masterFilter .= "`id`=" . QuotedValue($this->siswa_id->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $masterFilter;
	}

	// Session detail WHERE clause
	public function getDetailFilter()
	{

		// Detail filter
		$detailFilter = "";
		if ($this->getCurrentMasterTable() == "t0201_siswa") {
			if ($this->siswa_id->getSessionValue() <> "")
				$detailFilter .= "`siswa_id`=" . QuotedValue($this->siswa_id->getSessionValue(), DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $detailFilter;
	}

	// Master filter
	public function sqlMasterFilter_t0201_siswa()
	{
		return "`id`=@id@";
	}

	// Detail filter
	public function sqlDetailFilter_t0201_siswa()
	{
		return "`siswa_id`=@siswa_id@";
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom <> "") ? $this->SqlFrom : "`t0202_siswaiuran`";
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
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailOnAdd($rs);
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
		if ($success && $this->AuditTrailOnEdit && $rsold) {
			$rsaudit = $rs;
			$fldname = 'id';
			if (!array_key_exists($fldname, $rsaudit))
				$rsaudit[$fldname] = $rsold[$fldname];
			$this->writeAuditTrailOnEdit($rsold, $rsaudit);
		}
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
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
		if ($success && $this->AuditTrailOnDelete)
			$this->writeAuditTrailOnDelete($rs);
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->tahunajaran_id->DbValue = $row['tahunajaran_id'];
		$this->siswa_id->DbValue = $row['siswa_id'];
		$this->iuran_id->DbValue = $row['iuran_id'];
		$this->Nilai->DbValue = $row['Nilai'];
		$this->Terbayar->DbValue = $row['Terbayar'];
		$this->Sisa->DbValue = $row['Sisa'];
		$this->P01->DbValue = $row['P01'];
		$this->P02->DbValue = $row['P02'];
		$this->P03->DbValue = $row['P03'];
		$this->P04->DbValue = $row['P04'];
		$this->P05->DbValue = $row['P05'];
		$this->P06->DbValue = $row['P06'];
		$this->P07->DbValue = $row['P07'];
		$this->P08->DbValue = $row['P08'];
		$this->P09->DbValue = $row['P09'];
		$this->P10->DbValue = $row['P10'];
		$this->P11->DbValue = $row['P11'];
		$this->P12->DbValue = $row['P12'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		$val = is_array($row) ? (array_key_exists('id', $row) ? $row['id'] : NULL) : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "t0202_siswaiuranlist.php";
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
		if ($pageName == "t0202_siswaiuranview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t0202_siswaiuranedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t0202_siswaiuranadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t0202_siswaiuranlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm <> "")
			$url = $this->keyUrl("t0202_siswaiuranview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t0202_siswaiuranview.php", $this->getUrlParm(TABLE_SHOW_DETAIL . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm <> "")
			$url = "t0202_siswaiuranadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t0202_siswaiuranadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("t0202_siswaiuranedit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("t0202_siswaiuranadd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("t0202_siswaiurandelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		if ($this->getCurrentMasterTable() == "t0201_siswa" && !ContainsString($url, TABLE_SHOW_MASTER . "=")) {
			$url .= (ContainsString($url, "?") ? "&" : "?") . TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->siswa_id->CurrentValue);
		}
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
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
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
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
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
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
			$this->id->CurrentValue = $key;
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
		$this->id->setDbValue($rs->fields('id'));
		$this->tahunajaran_id->setDbValue($rs->fields('tahunajaran_id'));
		$this->siswa_id->setDbValue($rs->fields('siswa_id'));
		$this->iuran_id->setDbValue($rs->fields('iuran_id'));
		$this->Nilai->setDbValue($rs->fields('Nilai'));
		$this->Terbayar->setDbValue($rs->fields('Terbayar'));
		$this->Sisa->setDbValue($rs->fields('Sisa'));
		$this->P01->setDbValue($rs->fields('P01'));
		$this->P02->setDbValue($rs->fields('P02'));
		$this->P03->setDbValue($rs->fields('P03'));
		$this->P04->setDbValue($rs->fields('P04'));
		$this->P05->setDbValue($rs->fields('P05'));
		$this->P06->setDbValue($rs->fields('P06'));
		$this->P07->setDbValue($rs->fields('P07'));
		$this->P08->setDbValue($rs->fields('P08'));
		$this->P09->setDbValue($rs->fields('P09'));
		$this->P10->setDbValue($rs->fields('P10'));
		$this->P11->setDbValue($rs->fields('P11'));
		$this->P12->setDbValue($rs->fields('P12'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// tahunajaran_id
		// siswa_id
		// iuran_id
		// Nilai
		// Terbayar
		// Sisa
		// P01
		// P02
		// P03
		// P04
		// P05
		// P06
		// P07
		// P08
		// P09
		// P10
		// P11
		// P12
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// tahunajaran_id
		$curVal = strval($this->tahunajaran_id->CurrentValue);
		if ($curVal <> "") {
			$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->lookupCacheOption($curVal);
			if ($this->tahunajaran_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->tahunajaran_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->CurrentValue;
				}
			}
		} else {
			$this->tahunajaran_id->ViewValue = NULL;
		}
		$this->tahunajaran_id->ViewCustomAttributes = "";

		// siswa_id
		$this->siswa_id->ViewValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->ViewValue = FormatNumber($this->siswa_id->ViewValue, 0, -2, -2, -2);
		$this->siswa_id->ViewCustomAttributes = "";

		// iuran_id
		$curVal = strval($this->iuran_id->CurrentValue);
		if ($curVal <> "") {
			$this->iuran_id->ViewValue = $this->iuran_id->lookupCacheOption($curVal);
			if ($this->iuran_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->iuran_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = array();
					$arwrk[1] = $rswrk->fields('df');
					$arwrk[2] = $rswrk->fields('df2');
					$this->iuran_id->ViewValue = $this->iuran_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->iuran_id->ViewValue = $this->iuran_id->CurrentValue;
				}
			}
		} else {
			$this->iuran_id->ViewValue = NULL;
		}
		$this->iuran_id->ViewCustomAttributes = "";

		// Nilai
		$this->Nilai->ViewValue = $this->Nilai->CurrentValue;
		$this->Nilai->ViewValue = FormatNumber($this->Nilai->ViewValue, 2, -2, -2, -2);
		$this->Nilai->ViewCustomAttributes = "";

		// Terbayar
		$this->Terbayar->ViewValue = $this->Terbayar->CurrentValue;
		$this->Terbayar->ViewValue = FormatNumber($this->Terbayar->ViewValue, 2, -2, -2, -2);
		$this->Terbayar->ViewCustomAttributes = "";

		// Sisa
		$this->Sisa->ViewValue = $this->Sisa->CurrentValue;
		$this->Sisa->ViewValue = FormatNumber($this->Sisa->ViewValue, 2, -2, -2, -2);
		$this->Sisa->ViewCustomAttributes = "";

		// P01
		if (ConvertToBool($this->P01->CurrentValue)) {
			$this->P01->ViewValue = $this->P01->tagCaption(2) <> "" ? $this->P01->tagCaption(2) : "1";
		} else {
			$this->P01->ViewValue = $this->P01->tagCaption(1) <> "" ? $this->P01->tagCaption(1) : "0";
		}
		$this->P01->ViewCustomAttributes = "";

		// P02
		if (ConvertToBool($this->P02->CurrentValue)) {
			$this->P02->ViewValue = $this->P02->tagCaption(2) <> "" ? $this->P02->tagCaption(2) : "1";
		} else {
			$this->P02->ViewValue = $this->P02->tagCaption(1) <> "" ? $this->P02->tagCaption(1) : "0";
		}
		$this->P02->ViewCustomAttributes = "";

		// P03
		if (ConvertToBool($this->P03->CurrentValue)) {
			$this->P03->ViewValue = $this->P03->tagCaption(2) <> "" ? $this->P03->tagCaption(2) : "1";
		} else {
			$this->P03->ViewValue = $this->P03->tagCaption(1) <> "" ? $this->P03->tagCaption(1) : "0";
		}
		$this->P03->ViewCustomAttributes = "";

		// P04
		if (ConvertToBool($this->P04->CurrentValue)) {
			$this->P04->ViewValue = $this->P04->tagCaption(2) <> "" ? $this->P04->tagCaption(2) : "1";
		} else {
			$this->P04->ViewValue = $this->P04->tagCaption(1) <> "" ? $this->P04->tagCaption(1) : "0";
		}
		$this->P04->ViewCustomAttributes = "";

		// P05
		if (ConvertToBool($this->P05->CurrentValue)) {
			$this->P05->ViewValue = $this->P05->tagCaption(2) <> "" ? $this->P05->tagCaption(2) : "1";
		} else {
			$this->P05->ViewValue = $this->P05->tagCaption(1) <> "" ? $this->P05->tagCaption(1) : "0";
		}
		$this->P05->ViewCustomAttributes = "";

		// P06
		if (ConvertToBool($this->P06->CurrentValue)) {
			$this->P06->ViewValue = $this->P06->tagCaption(2) <> "" ? $this->P06->tagCaption(2) : "1";
		} else {
			$this->P06->ViewValue = $this->P06->tagCaption(1) <> "" ? $this->P06->tagCaption(1) : "0";
		}
		$this->P06->ViewCustomAttributes = "";

		// P07
		if (ConvertToBool($this->P07->CurrentValue)) {
			$this->P07->ViewValue = $this->P07->tagCaption(2) <> "" ? $this->P07->tagCaption(2) : "1";
		} else {
			$this->P07->ViewValue = $this->P07->tagCaption(1) <> "" ? $this->P07->tagCaption(1) : "0";
		}
		$this->P07->ViewCustomAttributes = "";

		// P08
		if (ConvertToBool($this->P08->CurrentValue)) {
			$this->P08->ViewValue = $this->P08->tagCaption(2) <> "" ? $this->P08->tagCaption(2) : "1";
		} else {
			$this->P08->ViewValue = $this->P08->tagCaption(1) <> "" ? $this->P08->tagCaption(1) : "0";
		}
		$this->P08->ViewCustomAttributes = "";

		// P09
		if (ConvertToBool($this->P09->CurrentValue)) {
			$this->P09->ViewValue = $this->P09->tagCaption(2) <> "" ? $this->P09->tagCaption(2) : "1";
		} else {
			$this->P09->ViewValue = $this->P09->tagCaption(1) <> "" ? $this->P09->tagCaption(1) : "0";
		}
		$this->P09->ViewCustomAttributes = "";

		// P10
		if (ConvertToBool($this->P10->CurrentValue)) {
			$this->P10->ViewValue = $this->P10->tagCaption(2) <> "" ? $this->P10->tagCaption(2) : "1";
		} else {
			$this->P10->ViewValue = $this->P10->tagCaption(1) <> "" ? $this->P10->tagCaption(1) : "0";
		}
		$this->P10->ViewCustomAttributes = "";

		// P11
		if (ConvertToBool($this->P11->CurrentValue)) {
			$this->P11->ViewValue = $this->P11->tagCaption(2) <> "" ? $this->P11->tagCaption(2) : "1";
		} else {
			$this->P11->ViewValue = $this->P11->tagCaption(1) <> "" ? $this->P11->tagCaption(1) : "0";
		}
		$this->P11->ViewCustomAttributes = "";

		// P12
		if (ConvertToBool($this->P12->CurrentValue)) {
			$this->P12->ViewValue = $this->P12->tagCaption(2) <> "" ? $this->P12->tagCaption(2) : "1";
		} else {
			$this->P12->ViewValue = $this->P12->tagCaption(1) <> "" ? $this->P12->tagCaption(1) : "0";
		}
		$this->P12->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// tahunajaran_id
		$this->tahunajaran_id->LinkCustomAttributes = "";
		$this->tahunajaran_id->HrefValue = "";
		$this->tahunajaran_id->TooltipValue = "";

		// siswa_id
		$this->siswa_id->LinkCustomAttributes = "";
		$this->siswa_id->HrefValue = "";
		$this->siswa_id->TooltipValue = "";

		// iuran_id
		$this->iuran_id->LinkCustomAttributes = "";
		$this->iuran_id->HrefValue = "";
		$this->iuran_id->TooltipValue = "";

		// Nilai
		$this->Nilai->LinkCustomAttributes = "";
		$this->Nilai->HrefValue = "";
		$this->Nilai->TooltipValue = "";

		// Terbayar
		$this->Terbayar->LinkCustomAttributes = "";
		$this->Terbayar->HrefValue = "";
		$this->Terbayar->TooltipValue = "";

		// Sisa
		$this->Sisa->LinkCustomAttributes = "";
		$this->Sisa->HrefValue = "";
		$this->Sisa->TooltipValue = "";

		// P01
		$this->P01->LinkCustomAttributes = "";
		$this->P01->HrefValue = "";
		$this->P01->TooltipValue = "";

		// P02
		$this->P02->LinkCustomAttributes = "";
		$this->P02->HrefValue = "";
		$this->P02->TooltipValue = "";

		// P03
		$this->P03->LinkCustomAttributes = "";
		$this->P03->HrefValue = "";
		$this->P03->TooltipValue = "";

		// P04
		$this->P04->LinkCustomAttributes = "";
		$this->P04->HrefValue = "";
		$this->P04->TooltipValue = "";

		// P05
		$this->P05->LinkCustomAttributes = "";
		$this->P05->HrefValue = "";
		$this->P05->TooltipValue = "";

		// P06
		$this->P06->LinkCustomAttributes = "";
		$this->P06->HrefValue = "";
		$this->P06->TooltipValue = "";

		// P07
		$this->P07->LinkCustomAttributes = "";
		$this->P07->HrefValue = "";
		$this->P07->TooltipValue = "";

		// P08
		$this->P08->LinkCustomAttributes = "";
		$this->P08->HrefValue = "";
		$this->P08->TooltipValue = "";

		// P09
		$this->P09->LinkCustomAttributes = "";
		$this->P09->HrefValue = "";
		$this->P09->TooltipValue = "";

		// P10
		$this->P10->LinkCustomAttributes = "";
		$this->P10->HrefValue = "";
		$this->P10->TooltipValue = "";

		// P11
		$this->P11->LinkCustomAttributes = "";
		$this->P11->HrefValue = "";
		$this->P11->TooltipValue = "";

		// P12
		$this->P12->LinkCustomAttributes = "";
		$this->P12->HrefValue = "";
		$this->P12->TooltipValue = "";

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

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// tahunajaran_id
		$this->tahunajaran_id->EditAttrs["class"] = "form-control";
		$this->tahunajaran_id->EditCustomAttributes = "";

		// siswa_id
		$this->siswa_id->EditAttrs["class"] = "form-control";
		$this->siswa_id->EditCustomAttributes = "";
		if ($this->siswa_id->getSessionValue() <> "") {
			$this->siswa_id->CurrentValue = $this->siswa_id->getSessionValue();
		$this->siswa_id->ViewValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->ViewValue = FormatNumber($this->siswa_id->ViewValue, 0, -2, -2, -2);
		$this->siswa_id->ViewCustomAttributes = "";
		} else {
		$this->siswa_id->EditValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->PlaceHolder = RemoveHtml($this->siswa_id->caption());
		}

		// iuran_id
		$this->iuran_id->EditAttrs["class"] = "form-control";
		$this->iuran_id->EditCustomAttributes = "";

		// Nilai
		$this->Nilai->EditAttrs["class"] = "form-control";
		$this->Nilai->EditCustomAttributes = "";
		$this->Nilai->EditValue = $this->Nilai->CurrentValue;
		$this->Nilai->PlaceHolder = RemoveHtml($this->Nilai->caption());
		if (strval($this->Nilai->EditValue) <> "" && is_numeric($this->Nilai->EditValue))
			$this->Nilai->EditValue = FormatNumber($this->Nilai->EditValue, -2, -2, -2, -2);

		// Terbayar
		$this->Terbayar->EditAttrs["class"] = "form-control";
		$this->Terbayar->EditCustomAttributes = "";
		$this->Terbayar->EditValue = $this->Terbayar->CurrentValue;
		$this->Terbayar->PlaceHolder = RemoveHtml($this->Terbayar->caption());
		if (strval($this->Terbayar->EditValue) <> "" && is_numeric($this->Terbayar->EditValue))
			$this->Terbayar->EditValue = FormatNumber($this->Terbayar->EditValue, -2, -2, -2, -2);

		// Sisa
		$this->Sisa->EditAttrs["class"] = "form-control";
		$this->Sisa->EditCustomAttributes = "";
		$this->Sisa->EditValue = $this->Sisa->CurrentValue;
		$this->Sisa->PlaceHolder = RemoveHtml($this->Sisa->caption());
		if (strval($this->Sisa->EditValue) <> "" && is_numeric($this->Sisa->EditValue))
			$this->Sisa->EditValue = FormatNumber($this->Sisa->EditValue, -2, -2, -2, -2);

		// P01
		$this->P01->EditCustomAttributes = "";
		$this->P01->EditValue = $this->P01->options(FALSE);

		// P02
		$this->P02->EditCustomAttributes = "";
		$this->P02->EditValue = $this->P02->options(FALSE);

		// P03
		$this->P03->EditCustomAttributes = "";
		$this->P03->EditValue = $this->P03->options(FALSE);

		// P04
		$this->P04->EditCustomAttributes = "";
		$this->P04->EditValue = $this->P04->options(FALSE);

		// P05
		$this->P05->EditCustomAttributes = "";
		$this->P05->EditValue = $this->P05->options(FALSE);

		// P06
		$this->P06->EditCustomAttributes = "";
		$this->P06->EditValue = $this->P06->options(FALSE);

		// P07
		$this->P07->EditCustomAttributes = "";
		$this->P07->EditValue = $this->P07->options(FALSE);

		// P08
		$this->P08->EditCustomAttributes = "";
		$this->P08->EditValue = $this->P08->options(FALSE);

		// P09
		$this->P09->EditCustomAttributes = "";
		$this->P09->EditValue = $this->P09->options(FALSE);

		// P10
		$this->P10->EditCustomAttributes = "";
		$this->P10->EditValue = $this->P10->options(FALSE);

		// P11
		$this->P11->EditCustomAttributes = "";
		$this->P11->EditValue = $this->P11->options(FALSE);

		// P12
		$this->P12->EditCustomAttributes = "";
		$this->P12->EditValue = $this->P12->options(FALSE);

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
					$doc->exportCaption($this->tahunajaran_id);
					$doc->exportCaption($this->iuran_id);
					$doc->exportCaption($this->Nilai);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->tahunajaran_id);
					$doc->exportCaption($this->siswa_id);
					$doc->exportCaption($this->iuran_id);
					$doc->exportCaption($this->Nilai);
					$doc->exportCaption($this->Terbayar);
					$doc->exportCaption($this->Sisa);
					$doc->exportCaption($this->P01);
					$doc->exportCaption($this->P02);
					$doc->exportCaption($this->P03);
					$doc->exportCaption($this->P04);
					$doc->exportCaption($this->P05);
					$doc->exportCaption($this->P06);
					$doc->exportCaption($this->P07);
					$doc->exportCaption($this->P08);
					$doc->exportCaption($this->P09);
					$doc->exportCaption($this->P10);
					$doc->exportCaption($this->P11);
					$doc->exportCaption($this->P12);
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
						$doc->exportField($this->tahunajaran_id);
						$doc->exportField($this->iuran_id);
						$doc->exportField($this->Nilai);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->tahunajaran_id);
						$doc->exportField($this->siswa_id);
						$doc->exportField($this->iuran_id);
						$doc->exportField($this->Nilai);
						$doc->exportField($this->Terbayar);
						$doc->exportField($this->Sisa);
						$doc->exportField($this->P01);
						$doc->exportField($this->P02);
						$doc->exportField($this->P03);
						$doc->exportField($this->P04);
						$doc->exportField($this->P05);
						$doc->exportField($this->P06);
						$doc->exportField($this->P07);
						$doc->exportField($this->P08);
						$doc->exportField($this->P09);
						$doc->exportField($this->P10);
						$doc->exportField($this->P11);
						$doc->exportField($this->P12);
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

	// Write Audit Trail start/end for grid update
	public function writeAuditTrailDummy($typ)
	{
		$table = 't0202_siswaiuran';
		$usr = CurrentUserID();
		WriteAuditTrail("log", DbCurrentDateTime(), ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	public function writeAuditTrailOnAdd(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnAdd)
			return;
		$table = 't0202_siswaiuran';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$newvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (AUDIT_TRAIL_TO_DATABASE)
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$newvalue = "[XML]"; // XML Field
				} else {
					$newvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $usr, "A", $table, $fldname, $key, "", $newvalue);
			}
		}
	}

	// Write Audit Trail (edit page)
	public function writeAuditTrailOnEdit(&$rsold, &$rsnew)
	{
		global $Language;
		if (!$this->AuditTrailOnEdit)
			return;
		$table = 't0202_siswaiuran';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rsold['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && array_key_exists($fldname, $rsold) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->DataType == DATATYPE_DATE) { // DateTime field
					$modified = (FormatDateTime($rsold[$fldname], 0) <> FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($this->fields[$fldname]->HtmlTag == "PASSWORD") { // Password Field
						$oldvalue = $Language->phrase("PasswordMask");
						$newvalue = $Language->phrase("PasswordMask");
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) { // Memo field
						if (AUDIT_TRAIL_TO_DATABASE) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) { // XML field
						$oldvalue = "[XML]";
						$newvalue = "[XML]";
					} else {
						$oldvalue = $rsold[$fldname];
						$newvalue = $rsnew[$fldname];
					}
					WriteAuditTrail("log", $dt, $id, $usr, "U", $table, $fldname, $key, $oldvalue, $newvalue);
				}
			}
		}
	}

	// Write Audit Trail (delete page)
	public function writeAuditTrailOnDelete(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnDelete)
			return;
		$table = 't0202_siswaiuran';

		// Get key value
		$key = "";
		if ($key <> "")
			$key .= $GLOBALS["COMPOSITE_KEY_SEPARATOR"];
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType <> DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$oldvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (AUDIT_TRAIL_TO_DATABASE)
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$oldvalue = "[XML]"; // XML field
				} else {
					$oldvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $curUser, "D", $table, $fldname, $key, $oldvalue, "");
			}
		}
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