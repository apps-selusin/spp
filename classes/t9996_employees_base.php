<?php
namespace PHPMaker2019\spp_prj;

/**
 * Table class for t9996_employees
 */
class t9996_employees_base extends ReportTable
{
	public $ShowGroupHeaderAsRow = FALSE;
	public $ShowCompactSummaryFooter = TRUE;
	public $EmployeeID;
	public $LastName;
	public $FirstName;
	public $Title;
	public $TitleOfCourtesy;
	public $BirthDate;
	public $HireDate;
	public $Address;
	public $City;
	public $Region;
	public $PostalCode;
	public $Country;
	public $HomePhone;
	public $Extension;
	public $_Email;
	public $Photo;
	public $Notes;
	public $ReportsTo;
	public $Password;
	public $UserLevel;
	public $Username;
	public $Activated;
	public $Profile;

	// Constructor
	public function __construct()
	{
		global $ReportLanguage, $CurrentLanguage;

		// Language object
		if (!isset($ReportLanguage))
			$ReportLanguage = new ReportLanguage();
		$this->TableVar = 't9996_employees_base';
		$this->TableName = 't9996_employees';
		$this->TableType = 'TABLE';
		$this->TableReportType = 'rpt';
		$this->SourceTableIsCustomView = FALSE;
		$this->Dbid = 'DB';

		// Update Table (for Personal Data delete only)
		$this->UpdateTable = "`t9996_employees`";
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// EmployeeID
		$this->EmployeeID = new ReportField('t9996_employees_base', 't9996_employees', 'x_EmployeeID', 'EmployeeID', '`EmployeeID`', 3, -1, FALSE, 'FORMATTED TEXT', 'NO');
		$this->EmployeeID->Sortable = TRUE; // Allow sort
		$this->EmployeeID->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->EmployeeID->DateFilter = "";
		$this->fields['EmployeeID'] = &$this->EmployeeID;

		// LastName
		$this->LastName = new ReportField('t9996_employees_base', 't9996_employees', 'x_LastName', 'LastName', '`LastName`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->LastName->Sortable = TRUE; // Allow sort
		$this->LastName->DateFilter = "";
		$this->fields['LastName'] = &$this->LastName;

		// FirstName
		$this->FirstName = new ReportField('t9996_employees_base', 't9996_employees', 'x_FirstName', 'FirstName', '`FirstName`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->FirstName->Sortable = TRUE; // Allow sort
		$this->FirstName->DateFilter = "";
		$this->fields['FirstName'] = &$this->FirstName;

		// Title
		$this->Title = new ReportField('t9996_employees_base', 't9996_employees', 'x_Title', 'Title', '`Title`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Title->Sortable = TRUE; // Allow sort
		$this->Title->DateFilter = "";
		$this->fields['Title'] = &$this->Title;

		// TitleOfCourtesy
		$this->TitleOfCourtesy = new ReportField('t9996_employees_base', 't9996_employees', 'x_TitleOfCourtesy', 'TitleOfCourtesy', '`TitleOfCourtesy`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TitleOfCourtesy->Sortable = TRUE; // Allow sort
		$this->TitleOfCourtesy->DateFilter = "";
		$this->fields['TitleOfCourtesy'] = &$this->TitleOfCourtesy;

		// BirthDate
		$this->BirthDate = new ReportField('t9996_employees_base', 't9996_employees', 'x_BirthDate', 'BirthDate', '`BirthDate`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->BirthDate->Sortable = TRUE; // Allow sort
		$this->BirthDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->BirthDate->DateFilter = "";
		$this->fields['BirthDate'] = &$this->BirthDate;

		// HireDate
		$this->HireDate = new ReportField('t9996_employees_base', 't9996_employees', 'x_HireDate', 'HireDate', '`HireDate`', 135, 0, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HireDate->Sortable = TRUE; // Allow sort
		$this->HireDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $ReportLanguage->phrase("IncorrectDate"));
		$this->HireDate->DateFilter = "";
		$this->fields['HireDate'] = &$this->HireDate;

		// Address
		$this->Address = new ReportField('t9996_employees_base', 't9996_employees', 'x_Address', 'Address', '`Address`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Address->Sortable = TRUE; // Allow sort
		$this->Address->DateFilter = "";
		$this->fields['Address'] = &$this->Address;

		// City
		$this->City = new ReportField('t9996_employees_base', 't9996_employees', 'x_City', 'City', '`City`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->City->Sortable = TRUE; // Allow sort
		$this->City->DateFilter = "";
		$this->fields['City'] = &$this->City;

		// Region
		$this->Region = new ReportField('t9996_employees_base', 't9996_employees', 'x_Region', 'Region', '`Region`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Region->Sortable = TRUE; // Allow sort
		$this->Region->DateFilter = "";
		$this->fields['Region'] = &$this->Region;

		// PostalCode
		$this->PostalCode = new ReportField('t9996_employees_base', 't9996_employees', 'x_PostalCode', 'PostalCode', '`PostalCode`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->PostalCode->Sortable = TRUE; // Allow sort
		$this->PostalCode->DateFilter = "";
		$this->fields['PostalCode'] = &$this->PostalCode;

		// Country
		$this->Country = new ReportField('t9996_employees_base', 't9996_employees', 'x_Country', 'Country', '`Country`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Country->Sortable = TRUE; // Allow sort
		$this->Country->DateFilter = "";
		$this->fields['Country'] = &$this->Country;

		// HomePhone
		$this->HomePhone = new ReportField('t9996_employees_base', 't9996_employees', 'x_HomePhone', 'HomePhone', '`HomePhone`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HomePhone->Sortable = TRUE; // Allow sort
		$this->HomePhone->DateFilter = "";
		$this->fields['HomePhone'] = &$this->HomePhone;

		// Extension
		$this->Extension = new ReportField('t9996_employees_base', 't9996_employees', 'x_Extension', 'Extension', '`Extension`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Extension->Sortable = TRUE; // Allow sort
		$this->Extension->DateFilter = "";
		$this->fields['Extension'] = &$this->Extension;

		// Email
		$this->_Email = new ReportField('t9996_employees_base', 't9996_employees', 'x__Email', 'Email', '`Email`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->_Email->Sortable = TRUE; // Allow sort
		$this->_Email->DateFilter = "";
		$this->fields['Email'] = &$this->_Email;

		// Photo
		$this->Photo = new ReportField('t9996_employees_base', 't9996_employees', 'x_Photo', 'Photo', '`Photo`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Photo->Sortable = TRUE; // Allow sort
		$this->Photo->DateFilter = "";
		$this->fields['Photo'] = &$this->Photo;

		// Notes
		$this->Notes = new ReportField('t9996_employees_base', 't9996_employees', 'x_Notes', 'Notes', '`Notes`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Notes->Sortable = TRUE; // Allow sort
		$this->Notes->DateFilter = "";
		$this->fields['Notes'] = &$this->Notes;

		// ReportsTo
		$this->ReportsTo = new ReportField('t9996_employees_base', 't9996_employees', 'x_ReportsTo', 'ReportsTo', '`ReportsTo`', 3, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ReportsTo->Sortable = TRUE; // Allow sort
		$this->ReportsTo->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->ReportsTo->DateFilter = "";
		$this->fields['ReportsTo'] = &$this->ReportsTo;

		// Password
		$this->Password = new ReportField('t9996_employees_base', 't9996_employees', 'x_Password', 'Password', '`Password`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Password->Sortable = TRUE; // Allow sort
		$this->Password->DateFilter = "";
		$this->fields['Password'] = &$this->Password;

		// UserLevel
		$this->UserLevel = new ReportField('t9996_employees_base', 't9996_employees', 'x_UserLevel', 'UserLevel', '`UserLevel`', 3, -1, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->UserLevel->Sortable = TRUE; // Allow sort
		$this->UserLevel->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->UserLevel->PleaseSelectText = $ReportLanguage->phrase("PleaseSelect"); // PleaseSelect text
		$this->UserLevel->DefaultErrorMessage = $ReportLanguage->phrase("IncorrectInteger");
		$this->UserLevel->DateFilter = "";
		$this->fields['UserLevel'] = &$this->UserLevel;

		// Username
		$this->Username = new ReportField('t9996_employees_base', 't9996_employees', 'x_Username', 'Username', '`Username`', 200, -1, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Username->Sortable = TRUE; // Allow sort
		$this->Username->DateFilter = "";
		$this->fields['Username'] = &$this->Username;

		// Activated
		$this->Activated = new ReportField('t9996_employees_base', 't9996_employees', 'x_Activated', 'Activated', '`Activated`', 202, -1, FALSE, 'FORMATTED TEXT', 'CHECKBOX');
		$this->Activated->Sortable = TRUE; // Allow sort
		$this->Activated->DateFilter = "";
		$this->fields['Activated'] = &$this->Activated;

		// Profile
		$this->Profile = new ReportField('t9996_employees_base', 't9996_employees', 'x_Profile', 'Profile', '`Profile`', 201, -1, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Profile->Sortable = TRUE; // Allow sort
		$this->Profile->DateFilter = "";
		$this->fields['Profile'] = &$this->Profile;
	}

	// Render for popup
	public function renderPopup()
	{
		global $ReportLanguage;
	}

	// Render for lookup
	public function renderLookup()
	{
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
		return ($this->_sqlFrom <> "") ? $this->_sqlFrom : "`t9996_employees`";
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
		return ($this->_sqlOrderBy <> "") ? $this->_sqlOrderBy : "";
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

	// Summary properties
	private $_sqlSelectAggregate = "";
	private $_sqlAggregatePrefix = "";
	private $_sqlAggregateSuffix = "";
	private $_sqlSelectCount = "";

	// Select Aggregate
	public function getSqlSelectAggregate()
	{
		return ($this->_sqlSelectAggregate <> "") ? $this->_sqlSelectAggregate : "SELECT * FROM " . $this->getSqlFrom();
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

	// User ID filter
	public function getUserIDFilter($userId = NULL)
	{
		global $Security;
		if ($userId === NULL)
			$userId = $Security->currentUserID();
		$userIdFilter = "";
		if (!$Security->isAdmin()) {
			$userIdFilter = $Security->userIDList();
			if ($userIdFilter <> "")
				$userIdFilter = '`EmployeeID` IN (' . $userIdFilter . ')';
			if ($userIdFilter == "")
				$userIdFilter = "0=1";
		}

		// Call Row Rendered event
		$this->UserID_Filtering($userIdFilter);
		return $userIdFilter;
	}

	// Function to get the child user id list for this user
	protected function childUserIdList($userId)
	{
		$conn = &$this->getConnection();

		// Get all values
		if ($userId == "-1") {
			$sql = "SELECT `EmployeeID` FROM `t9996_employees`";
		} else {
			$sql = "SELECT `EmployeeID` FROM `t9996_employees` WHERE `EmployeeID` = " . QuotedValue($userId, DATATYPE_NUMBER, $this->Dbid);
		}
		$rs = $conn->execute($sql);
		$arUser = [];
		if ($rs) {
			while (!$rs->EOF) {
				$arUser[] = $rs->fields('EmployeeID');
				$rs->moveNext();
			}
			$rs->close();
		}
		sort($arUser);
		return $arUser;
	}

	// User ID list
	protected function userIdList($ar)
	{
		$wrk = "";
		if (is_array($ar)) {
			$cntar = count($ar);
			for ($i = 0; $i < $cntar; $i++) {
				if ($wrk <> "")
					$wrk .= ", ";
				$wrk .= QuotedValue($ar[$i], DATATYPE_NUMBER, $this->Dbid);
			}
		}
		return $wrk;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter)
	{
		global $Security;
		if (!$Security->isAdmin()) 
			AddFilter($filter, $this->getUserIDFilter());
		return $filter;
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

	// Delete uploaded files (for Personal Data only)
	public function deleteUploadedFiles($row)
	{

		// Nothing to delete
		return TRUE;
	}

	// DELETE statement (for Personal Data only)
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('EmployeeID', $rs))
				AddFilter($where, QuotedName('EmployeeID', $this->Dbid) . '=' . QuotedValue($rs['EmployeeID'], $this->EmployeeID->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete (for Personal Data only)
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$conn = &$this->getConnection();
		return $conn->execute($this->deleteSql($rs, $where, $curfilter));
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