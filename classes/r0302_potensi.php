<?php
namespace PHPMaker2019\spp_prj;

/**
 * Table class for r0302_potensi
 */
class r0302_potensi extends ReportTable
{
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;
	public $ds_id;
	public $ta_id;
	public $TahunAjaran;
	public $s_id;
	public $Sekolah;
	public $k_id;
	public $Kelas;
	public $dsd_id;
	public $siswa_id;
	public $NIS;
	public $Nama;
	public $sswiur_id;
	public $iuran_id;
	public $Iuran;
	public $Jenis;
	public $Nilai;
	public $Jumlah;
	public $Terbayar;
	public $Sisa;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 'r0302_potensi';
		$this->TableName = 'r0302_potensi';
		$this->TableType = 'REPORT';
		$this->TableReportType = 'summary';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// ds_id
		$this->ds_id = new ReportField('r0302_potensi', 'r0302_potensi', 'x_ds_id', 'ds_id', '`ds_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ds_id->Sortable = TRUE; // Allow sort
		$this->ds_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->ds_id->DateFilter = "";
		$this->fields['ds_id'] = &$this->ds_id;

		// ta_id
		$this->ta_id = new ReportField('r0302_potensi', 'r0302_potensi', 'x_ta_id', 'ta_id', '`ta_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->ta_id->Sortable = TRUE; // Allow sort
		$this->ta_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->ta_id->DateFilter = "";
		$this->fields['ta_id'] = &$this->ta_id;

		// TahunAjaran
		$this->TahunAjaran = new ReportField('r0302_potensi', 'r0302_potensi', 'x_TahunAjaran', 'TahunAjaran', '`TahunAjaran`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TahunAjaran->Sortable = TRUE; // Allow sort
		$this->TahunAjaran->GroupingFieldId = 1;
		$this->TahunAjaran->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->TahunAjaran->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->TahunAjaran->DateFilter = "";
		$this->TahunAjaran->GroupByType = "";
		$this->TahunAjaran->GroupInterval = "0";
		$this->TahunAjaran->GroupSql = "";
		$this->fields['TahunAjaran'] = &$this->TahunAjaran;

		// s_id
		$this->s_id = new ReportField('r0302_potensi', 'r0302_potensi', 'x_s_id', 's_id', '`s_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->s_id->Sortable = TRUE; // Allow sort
		$this->s_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->s_id->DateFilter = "";
		$this->fields['s_id'] = &$this->s_id;

		// Sekolah
		$this->Sekolah = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Sekolah', 'Sekolah', '`Sekolah`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sekolah->Sortable = TRUE; // Allow sort
		$this->Sekolah->GroupingFieldId = 2;
		$this->Sekolah->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->Sekolah->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->Sekolah->DateFilter = "";
		$this->Sekolah->GroupByType = "";
		$this->Sekolah->GroupInterval = "0";
		$this->Sekolah->GroupSql = "";
		$this->fields['Sekolah'] = &$this->Sekolah;

		// k_id
		$this->k_id = new ReportField('r0302_potensi', 'r0302_potensi', 'x_k_id', 'k_id', '`k_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->k_id->Sortable = TRUE; // Allow sort
		$this->k_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->k_id->DateFilter = "";
		$this->fields['k_id'] = &$this->k_id;

		// Kelas
		$this->Kelas = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Kelas', 'Kelas', '`Kelas`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Kelas->Sortable = TRUE; // Allow sort
		$this->Kelas->GroupingFieldId = 3;
		$this->Kelas->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->Kelas->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->Kelas->DateFilter = "";
		$this->Kelas->GroupByType = "";
		$this->Kelas->GroupInterval = "0";
		$this->Kelas->GroupSql = "";
		$this->fields['Kelas'] = &$this->Kelas;

		// dsd_id
		$this->dsd_id = new ReportField('r0302_potensi', 'r0302_potensi', 'x_dsd_id', 'dsd_id', '`dsd_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->dsd_id->Sortable = TRUE; // Allow sort
		$this->dsd_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->dsd_id->DateFilter = "";
		$this->fields['dsd_id'] = &$this->dsd_id;

		// siswa_id
		$this->siswa_id = new ReportField('r0302_potensi', 'r0302_potensi', 'x_siswa_id', 'siswa_id', '`siswa_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->siswa_id->Sortable = TRUE; // Allow sort
		$this->siswa_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->siswa_id->DateFilter = "";
		$this->fields['siswa_id'] = &$this->siswa_id;

		// NIS
		$this->NIS = new ReportField('r0302_potensi', 'r0302_potensi', 'x_NIS', 'NIS', '`NIS`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->NIS->Sortable = TRUE; // Allow sort
		$this->NIS->GroupingFieldId = 4;
		$this->NIS->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->NIS->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->NIS->DateFilter = "";
		$this->NIS->GroupByType = "";
		$this->NIS->GroupInterval = "0";
		$this->NIS->GroupSql = "";
		$this->fields['NIS'] = &$this->NIS;

		// Nama
		$this->Nama = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Nama', 'Nama', '`Nama`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nama->Sortable = TRUE; // Allow sort
		$this->Nama->GroupingFieldId = 5;
		$this->Nama->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->Nama->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->Nama->DateFilter = "";
		$this->Nama->GroupByType = "";
		$this->Nama->GroupInterval = "0";
		$this->Nama->GroupSql = "";
		$this->fields['Nama'] = &$this->Nama;

		// sswiur_id
		$this->sswiur_id = new ReportField('r0302_potensi', 'r0302_potensi', 'x_sswiur_id', 'sswiur_id', '`sswiur_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->sswiur_id->Sortable = TRUE; // Allow sort
		$this->sswiur_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->sswiur_id->DateFilter = "";
		$this->fields['sswiur_id'] = &$this->sswiur_id;

		// iuran_id
		$this->iuran_id = new ReportField('r0302_potensi', 'r0302_potensi', 'x_iuran_id', 'iuran_id', '`iuran_id`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->iuran_id->Sortable = TRUE; // Allow sort
		$this->iuran_id->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->iuran_id->DateFilter = "";
		$this->fields['iuran_id'] = &$this->iuran_id;

		// Iuran
		$this->Iuran = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Iuran', 'Iuran', '`Iuran`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Iuran->Sortable = TRUE; // Allow sort
		$this->Iuran->DateFilter = "";
		$this->fields['Iuran'] = &$this->Iuran;

		// Jenis
		$this->Jenis = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Jenis', 'Jenis', '`Jenis`', 202, -1, FALSE, 'FORMATTED TEXT', 'RADIO');
		$this->Jenis->Sortable = TRUE; // Allow sort
		$this->Jenis->DateFilter = "";
		$this->fields['Jenis'] = &$this->Jenis;

		// Nilai
		$this->Nilai = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Nilai', 'Nilai', '`Nilai`', 4, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nilai->Sortable = TRUE; // Allow sort
		$this->Nilai->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectFloat");
		$this->Nilai->DateFilter = "";
		$this->fields['Nilai'] = &$this->Nilai;

		// Jumlah
		$this->Jumlah = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Jumlah', 'Jumlah', '`Jumlah`', 5, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Jumlah->Sortable = TRUE; // Allow sort
		$this->Jumlah->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectFloat");
		$this->Jumlah->DateFilter = "";
		$this->fields['Jumlah'] = &$this->Jumlah;

		// Terbayar
		$this->Terbayar = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Terbayar', 'Terbayar', '`Terbayar`', 5, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Terbayar->Sortable = TRUE; // Allow sort
		$this->Terbayar->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectFloat");
		$this->Terbayar->DateFilter = "";
		$this->fields['Terbayar'] = &$this->Terbayar;

		// Sisa
		$this->Sisa = new ReportField('r0302_potensi', 'r0302_potensi', 'x_Sisa', 'Sisa', '`Sisa`', 5, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sisa->Sortable = TRUE; // Allow sort
		$this->Sisa->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectFloat");
		$this->Sisa->DateFilter = "";
		$this->fields['Sisa'] = &$this->Sisa;
	}

	// Render for popup
	public function renderPopup()
	{
		global $ReportLanguage;
	}

	// Render for lookup
	public function renderLookup()
	{
		$this->TahunAjaran->ViewValue = $this->TahunAjaran->CurrentValue;
		$this->Sekolah->ViewValue = $this->Sekolah->CurrentValue;
		$this->Kelas->ViewValue = $this->Kelas->CurrentValue;
	}

	// Get Field Visibility
	public function getFieldVisibility($fldparm)
	{
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Multiple column sort
	protected function updateSort(&$fld, $ctrl)
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
			if ($fld->GroupingFieldId == 0) {
				if ($ctrl) {
					$orderBy = $this->getDetailOrderBy();
					if (strpos($orderBy, $sortField . " " . $lastSort) !== FALSE) {
						$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
					} else {
						if ($orderBy <> "") $orderBy .= ", ";
						$orderBy .= $sortField . " " . $thisSort;
					}
					$this->setDetailOrderBy($orderBy); // Save to Session
				} else {
					$this->setDetailOrderBy($sortField . " " . $thisSort); // Save to Session
				}
			}
		} else {
			if ($fld->GroupingFieldId == 0 && !$ctrl) $fld->setSort("");
		}
	}

	// Get Sort SQL
	protected function sortSql()
	{
		$dtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = [];
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->Expression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->GroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->GroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sortSql = "";
		foreach ($argrps as $grp) {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $grp;
		}
		if ($dtlSortSql <> "") {
			if ($sortSql <> "") $sortSql .= ", ";
			$sortSql .= $dtlSortSql;
		}
		return $sortSql;
	}

	// Table level SQL
	private $_sqlFrom = "";
	private $_sqlSelect = "";
	private $_sqlWhere = "";
	private $_sqlGroupBy = "";
	private $_sqlHaving = "";
	private $_sqlOrderBy = "";

	// From
	public function getSqlFrom()
	{
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`v0302_potensi`";
	}
	public function setSqlFrom($v)
	{
		$this->_sqlFrom = $v;
	}

	// Select
	public function getSqlSelect()
	{
		return ($this->_sqlSelect <> "") ? $this->_sqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function setSqlSelect($v)
	{
		$this->_sqlSelect = $v;
	}

	// Where
	public function getSqlWhere()
	{
		$where = ($this->_sqlWhere <> "") ? $this->_sqlWhere : "";
		$filter = "";
		AddFilter($where, $filter);
		return $where;
	}
	public function setSqlWhere($v)
	{
		$this->_sqlWhere = $v;
	}

	// Group By
	public function getSqlGroupBy()
	{
		return ($this->_sqlGroupBy <> "") ? $this->_sqlGroupBy : "";
	}
	public function setSqlGroupBy($v)
	{
		$this->_sqlGroupBy = $v;
	}

	// Having
	public function getSqlHaving()
	{
		return ($this->_sqlHaving <> "") ? $this->_sqlHaving : "";
	}
	public function setSqlHaving($v)
	{
		$this->_sqlHaving = $v;
	}

	// Order By
	public function getSqlOrderBy()
	{
		return ($this->_sqlOrderBy <> "") ? $this->_sqlOrderBy : "`TahunAjaran` ASC, `Sekolah` ASC, `Kelas` ASC, `NIS` ASC, `Nama` ASC";
	}
	public function setSqlOrderBy($v)
	{
		$this->_sqlOrderBy = $v;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table Level Group SQL
	private $_sqlFirstGroupField = "";
	private $_sqlSelectGroup = "";
	private $_sqlOrderByGroup = "";

	// First Group Field
	public function getSqlFirstGroupField()
	{
		return ($this->_sqlFirstGroupField <> "") ? $this->_sqlFirstGroupField : "`TahunAjaran`";
	}
	public function setSqlFirstGroupField($v)
	{
		$this->_sqlFirstGroupField = $v;
	}

	// Select Group
	public function getSqlSelectGroup()
	{
		return ($this->_sqlSelectGroup <> "") ? $this->_sqlSelectGroup : "SELECT DISTINCT " . $this->getSqlFirstGroupField() . " FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectGroup($v)
	{
		$this->_sqlSelectGroup = $v;
	}

	// Order By Group
	public function getSqlOrderByGroup()
	{
		return ($this->_sqlOrderByGroup <> "") ? $this->_sqlOrderByGroup : "`TahunAjaran` ASC";
	}
	public function setSqlOrderByGroup($v)
	{
		$this->_sqlOrderByGroup = $v;
	}

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate <> "") ? $this->_sqlSelectAggregate : "SELECT SUM(`Jumlah`) AS `sum_jumlah`, SUM(`Terbayar`) AS `sum_terbayar`, SUM(`Sisa`) AS `sum_sisa` FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectAggregate($v)
	{
		$this->_sqlSelectAggregate = $v;
	}

	// Aggregate Prefix
	public function getSqlAggregatePrefix()
	{
		return ($this->_sqlAggregatePrefix <> "") ? $this->_sqlAggregatePrefix : "";
	}
	public function setSqlAggregatePrefix($v)
	{
		$this->_sqlAggregatePrefix = $v;
	}

	// Aggregate Suffix
	public function getSqlAggregateSuffix()
	{
		return ($this->_sqlAggregateSuffix <> "") ? $this->_sqlAggregateSuffix : "";
	}
	public function setSqlAggregateSuffix($v)
	{
		$this->_sqlAggregateSuffix = $v;
	}

	// Select Count
	public function getSqlSelectCount()
	{
		return ($this->_sqlSelectCount <> "") ? $this->_sqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}
	public function setSqlSelectCount($v)
	{
		$this->_sqlSelectCount = $v;
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

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = &$this->getConnection();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = '';
		return $rs;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		global $DashboardReport;
		if ($this->isExport() || $DashboardReport ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {

			//$urlParm = "order=" . urlencode($fld->Name) . "&ordertype=" . $fld->reverseSort();
			$urlParm = "order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort();
			return CurrentPageName() . "?" . $urlParm;
		} else {
			return "";
		}
	}

	// Lookup data from table
	public function lookup()
	{
		global $Security, $RequestSecurity, $PROJECT_ID, $RELATED_PROJECT_ID;
		$projectId = $RELATED_PROJECT_ID;

		// Check token first
		$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		$validRequest = FALSE;
		if (is_callable($func) && Post(TOKEN_NAME) !== NULL) {
			$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			if ($validRequest) {
				if (!isset($Security)) {
					if (session_status() !== PHP_SESSION_ACTIVE)
						session_start(); // Init session data
					$Security = new AdvancedSecurity();
					if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
					$Security->loadCurrentUserLevel($projectId . $this->TableName);
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
			$Security->loadCurrentUserLevel($projectId . $this->TableName);
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

		// Create lookup object and output JSON
		$lookup = new ReportLookup($linkField, $this->TableVar, $distinct, $linkField, $displayFields, $parentFields, $childFields, $filterFields, $filterFieldVars, $autoFillSourceFields);
		foreach ($filterFields as $i => $filterField) { // Set up filter operators
			if (@$filterOperators[$i] <> "")
				$lookup->setFilterOperator($filterField, $filterOperators[$i]);
		}
		$lookup->LookupType = $lookupType; // Lookup type
		if (Post("keys") !== NULL) { // Selected records from modal
			$keys = Post("keys");
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
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["class"] = "xxx";

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

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', PROJECT_NAMESPACE . 'GetStartsWithAFilter'); // With function, or
		//RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->Name == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->Name == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->Name == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->Name == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>