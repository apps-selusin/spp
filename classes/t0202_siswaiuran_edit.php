<?php
namespace PHPMaker2019\spp_prj;

/**
 * Page class
 */
class t0202_siswaiuran_edit extends t0202_siswaiuran
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{45A85772-754E-4F4B-A197-9291CE1FD3F9}";

	// Table name
	public $TableName = 't0202_siswaiuran';

	// Page object name
	public $PageObjName = "t0202_siswaiuran_edit";

	// Audit Trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Page URL
	private $_pageUrl = "";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		if ($this->_pageUrl == "") {
			$this->_pageUrl = CurrentPageName() . "?";
			if ($this->UseTokenInUrl)
				$this->_pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		}
		return $this->_pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = PROJECT_NAMESPACE . CREATE_TOKEN_FUNC; // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (t0202_siswaiuran)
		if (!isset($GLOBALS["t0202_siswaiuran"]) || get_class($GLOBALS["t0202_siswaiuran"]) == PROJECT_NAMESPACE . "t0202_siswaiuran") {
			$GLOBALS["t0202_siswaiuran"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t0202_siswaiuran"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (t0201_siswa)
		if (!isset($GLOBALS['t0201_siswa']))
			$GLOBALS['t0201_siswa'] = new t0201_siswa();

		// Table object (t9996_employees)
		if (!isset($GLOBALS['t9996_employees']))
			$GLOBALS['t9996_employees'] = new t9996_employees();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't0202_siswaiuran');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (t9996_employees)
		if (!isset($UserTable)) {
			$UserTable = new t9996_employees();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $t0202_siswaiuran;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t0202_siswaiuran);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t0202_siswaiuranview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType($val), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => MimeContentType($val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => FullUrl($fld->hrefPath() . $file)];
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
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . CHECK_TOKEN_FUNC;
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t0202_siswaiuranlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->setVisibility();
		$this->tahunajaran_id->setVisibility();
		$this->siswa_id->setVisibility();
		$this->iuran_id->setVisibility();
		$this->Nilai->setVisibility();
		$this->Terbayar->setVisibility();
		$this->Sisa->setVisibility();
		$this->P01->setVisibility();
		$this->P02->setVisibility();
		$this->P03->setVisibility();
		$this->P04->setVisibility();
		$this->P05->setVisibility();
		$this->P06->setVisibility();
		$this->P07->setVisibility();
		$this->P08->setVisibility();
		$this->P09->setVisibility();
		$this->P10->setVisibility();
		$this->P11->setVisibility();
		$this->P12->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->tahunajaran_id);
		$this->setupLookupOptions($this->iuran_id);

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get action code
			if (!$this->isShow()) // Not reload record, handle as postback
				$postBack = TRUE;

			// Load key from Form
			if ($CurrentForm->hasValue("x_id")) {
				$this->id->setFormValue($CurrentForm->getValue("x_id"));
			}
		} else {
			$this->CurrentAction = "show"; // Default action is display

			// Load key from QueryString
			$loadByQuery = FALSE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$loadByQuery = TRUE;
			} else {
				$this->id->CurrentValue = NULL;
			}
		}

		// Set up master detail parameters
		$this->setupMasterParms();

		// Load current record
		$loaded = $this->loadRow();

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
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
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t0202_siswaiuranlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t0202_siswaiuranlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Set up starting record parameters
	public function setupStartRec()
	{
		if ($this->DisplayRecs == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			if (Get(TABLE_START_REC) !== NULL) { // Check for "start" parameter
				$this->StartRec = Get(TABLE_START_REC);
				$this->setStartRecordNumber($this->StartRec);
			} elseif (Get(TABLE_PAGE_NO) !== NULL) {
				$pageNo = Get(TABLE_PAGE_NO);
				if (is_numeric($pageNo)) {
					$this->StartRec = ($pageNo - 1) * $this->DisplayRecs + 1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1) {
						$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif ($this->StartRec > $this->TotalRecs) { // Avoid starting record > total records
			$this->StartRec = (int)(($this->TotalRecs - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec - 1) % $this->DisplayRecs <> 0) {
			$this->StartRec = (int)(($this->StartRec - 1)/$this->DisplayRecs) * $this->DisplayRecs + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);

		// Check field name 'tahunajaran_id' first before field var 'x_tahunajaran_id'
		$val = $CurrentForm->hasValue("tahunajaran_id") ? $CurrentForm->getValue("tahunajaran_id") : $CurrentForm->getValue("x_tahunajaran_id");
		if (!$this->tahunajaran_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->tahunajaran_id->Visible = FALSE; // Disable update for API request
			else
				$this->tahunajaran_id->setFormValue($val);
		}

		// Check field name 'siswa_id' first before field var 'x_siswa_id'
		$val = $CurrentForm->hasValue("siswa_id") ? $CurrentForm->getValue("siswa_id") : $CurrentForm->getValue("x_siswa_id");
		if (!$this->siswa_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->siswa_id->Visible = FALSE; // Disable update for API request
			else
				$this->siswa_id->setFormValue($val);
		}

		// Check field name 'iuran_id' first before field var 'x_iuran_id'
		$val = $CurrentForm->hasValue("iuran_id") ? $CurrentForm->getValue("iuran_id") : $CurrentForm->getValue("x_iuran_id");
		if (!$this->iuran_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->iuran_id->Visible = FALSE; // Disable update for API request
			else
				$this->iuran_id->setFormValue($val);
		}

		// Check field name 'Nilai' first before field var 'x_Nilai'
		$val = $CurrentForm->hasValue("Nilai") ? $CurrentForm->getValue("Nilai") : $CurrentForm->getValue("x_Nilai");
		if (!$this->Nilai->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Nilai->Visible = FALSE; // Disable update for API request
			else
				$this->Nilai->setFormValue($val);
		}

		// Check field name 'Terbayar' first before field var 'x_Terbayar'
		$val = $CurrentForm->hasValue("Terbayar") ? $CurrentForm->getValue("Terbayar") : $CurrentForm->getValue("x_Terbayar");
		if (!$this->Terbayar->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Terbayar->Visible = FALSE; // Disable update for API request
			else
				$this->Terbayar->setFormValue($val);
		}

		// Check field name 'Sisa' first before field var 'x_Sisa'
		$val = $CurrentForm->hasValue("Sisa") ? $CurrentForm->getValue("Sisa") : $CurrentForm->getValue("x_Sisa");
		if (!$this->Sisa->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sisa->Visible = FALSE; // Disable update for API request
			else
				$this->Sisa->setFormValue($val);
		}

		// Check field name 'P01' first before field var 'x_P01'
		$val = $CurrentForm->hasValue("P01") ? $CurrentForm->getValue("P01") : $CurrentForm->getValue("x_P01");
		if (!$this->P01->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P01->Visible = FALSE; // Disable update for API request
			else
				$this->P01->setFormValue($val);
		}

		// Check field name 'P02' first before field var 'x_P02'
		$val = $CurrentForm->hasValue("P02") ? $CurrentForm->getValue("P02") : $CurrentForm->getValue("x_P02");
		if (!$this->P02->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P02->Visible = FALSE; // Disable update for API request
			else
				$this->P02->setFormValue($val);
		}

		// Check field name 'P03' first before field var 'x_P03'
		$val = $CurrentForm->hasValue("P03") ? $CurrentForm->getValue("P03") : $CurrentForm->getValue("x_P03");
		if (!$this->P03->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P03->Visible = FALSE; // Disable update for API request
			else
				$this->P03->setFormValue($val);
		}

		// Check field name 'P04' first before field var 'x_P04'
		$val = $CurrentForm->hasValue("P04") ? $CurrentForm->getValue("P04") : $CurrentForm->getValue("x_P04");
		if (!$this->P04->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P04->Visible = FALSE; // Disable update for API request
			else
				$this->P04->setFormValue($val);
		}

		// Check field name 'P05' first before field var 'x_P05'
		$val = $CurrentForm->hasValue("P05") ? $CurrentForm->getValue("P05") : $CurrentForm->getValue("x_P05");
		if (!$this->P05->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P05->Visible = FALSE; // Disable update for API request
			else
				$this->P05->setFormValue($val);
		}

		// Check field name 'P06' first before field var 'x_P06'
		$val = $CurrentForm->hasValue("P06") ? $CurrentForm->getValue("P06") : $CurrentForm->getValue("x_P06");
		if (!$this->P06->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P06->Visible = FALSE; // Disable update for API request
			else
				$this->P06->setFormValue($val);
		}

		// Check field name 'P07' first before field var 'x_P07'
		$val = $CurrentForm->hasValue("P07") ? $CurrentForm->getValue("P07") : $CurrentForm->getValue("x_P07");
		if (!$this->P07->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P07->Visible = FALSE; // Disable update for API request
			else
				$this->P07->setFormValue($val);
		}

		// Check field name 'P08' first before field var 'x_P08'
		$val = $CurrentForm->hasValue("P08") ? $CurrentForm->getValue("P08") : $CurrentForm->getValue("x_P08");
		if (!$this->P08->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P08->Visible = FALSE; // Disable update for API request
			else
				$this->P08->setFormValue($val);
		}

		// Check field name 'P09' first before field var 'x_P09'
		$val = $CurrentForm->hasValue("P09") ? $CurrentForm->getValue("P09") : $CurrentForm->getValue("x_P09");
		if (!$this->P09->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P09->Visible = FALSE; // Disable update for API request
			else
				$this->P09->setFormValue($val);
		}

		// Check field name 'P10' first before field var 'x_P10'
		$val = $CurrentForm->hasValue("P10") ? $CurrentForm->getValue("P10") : $CurrentForm->getValue("x_P10");
		if (!$this->P10->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P10->Visible = FALSE; // Disable update for API request
			else
				$this->P10->setFormValue($val);
		}

		// Check field name 'P11' first before field var 'x_P11'
		$val = $CurrentForm->hasValue("P11") ? $CurrentForm->getValue("P11") : $CurrentForm->getValue("x_P11");
		if (!$this->P11->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P11->Visible = FALSE; // Disable update for API request
			else
				$this->P11->setFormValue($val);
		}

		// Check field name 'P12' first before field var 'x_P12'
		$val = $CurrentForm->hasValue("P12") ? $CurrentForm->getValue("P12") : $CurrentForm->getValue("x_P12");
		if (!$this->P12->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->P12->Visible = FALSE; // Disable update for API request
			else
				$this->P12->setFormValue($val);
		}
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->id->CurrentValue = $this->id->FormValue;
		$this->tahunajaran_id->CurrentValue = $this->tahunajaran_id->FormValue;
		$this->siswa_id->CurrentValue = $this->siswa_id->FormValue;
		$this->iuran_id->CurrentValue = $this->iuran_id->FormValue;
		$this->Nilai->CurrentValue = $this->Nilai->FormValue;
		$this->Terbayar->CurrentValue = $this->Terbayar->FormValue;
		$this->Sisa->CurrentValue = $this->Sisa->FormValue;
		$this->P01->CurrentValue = $this->P01->FormValue;
		$this->P02->CurrentValue = $this->P02->FormValue;
		$this->P03->CurrentValue = $this->P03->FormValue;
		$this->P04->CurrentValue = $this->P04->FormValue;
		$this->P05->CurrentValue = $this->P05->FormValue;
		$this->P06->CurrentValue = $this->P06->FormValue;
		$this->P07->CurrentValue = $this->P07->FormValue;
		$this->P08->CurrentValue = $this->P08->FormValue;
		$this->P09->CurrentValue = $this->P09->FormValue;
		$this->P10->CurrentValue = $this->P10->FormValue;
		$this->P11->CurrentValue = $this->P11->FormValue;
		$this->P12->CurrentValue = $this->P12->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->tahunajaran_id->setDbValue($row['tahunajaran_id']);
		$this->siswa_id->setDbValue($row['siswa_id']);
		$this->iuran_id->setDbValue($row['iuran_id']);
		$this->Nilai->setDbValue($row['Nilai']);
		$this->Terbayar->setDbValue($row['Terbayar']);
		$this->Sisa->setDbValue($row['Sisa']);
		$this->P01->setDbValue($row['P01']);
		$this->P02->setDbValue($row['P02']);
		$this->P03->setDbValue($row['P03']);
		$this->P04->setDbValue($row['P04']);
		$this->P05->setDbValue($row['P05']);
		$this->P06->setDbValue($row['P06']);
		$this->P07->setDbValue($row['P07']);
		$this->P08->setDbValue($row['P08']);
		$this->P09->setDbValue($row['P09']);
		$this->P10->setDbValue($row['P10']);
		$this->P11->setDbValue($row['P11']);
		$this->P12->setDbValue($row['P12']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['tahunajaran_id'] = NULL;
		$row['siswa_id'] = NULL;
		$row['iuran_id'] = NULL;
		$row['Nilai'] = NULL;
		$row['Terbayar'] = NULL;
		$row['Sisa'] = NULL;
		$row['P01'] = NULL;
		$row['P02'] = NULL;
		$row['P03'] = NULL;
		$row['P04'] = NULL;
		$row['P05'] = NULL;
		$row['P06'] = NULL;
		$row['P07'] = NULL;
		$row['P08'] = NULL;
		$row['P09'] = NULL;
		$row['P10'] = NULL;
		$row['P11'] = NULL;
		$row['P12'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) <> "")
			$this->id->CurrentValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->Nilai->FormValue == $this->Nilai->CurrentValue && is_numeric(ConvertToFloatString($this->Nilai->CurrentValue)))
			$this->Nilai->CurrentValue = ConvertToFloatString($this->Nilai->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Terbayar->FormValue == $this->Terbayar->CurrentValue && is_numeric(ConvertToFloatString($this->Terbayar->CurrentValue)))
			$this->Terbayar->CurrentValue = ConvertToFloatString($this->Terbayar->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Sisa->FormValue == $this->Sisa->CurrentValue && is_numeric(ConvertToFloatString($this->Sisa->CurrentValue)))
			$this->Sisa->CurrentValue = ConvertToFloatString($this->Sisa->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// tahunajaran_id
			$this->tahunajaran_id->EditAttrs["class"] = "form-control";
			$this->tahunajaran_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->tahunajaran_id->CurrentValue));
			if ($curVal <> "")
				$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->lookupCacheOption($curVal);
			else
				$this->tahunajaran_id->ViewValue = $this->tahunajaran_id->Lookup !== NULL && is_array($this->tahunajaran_id->Lookup->Options) ? $curVal : NULL;
			if ($this->tahunajaran_id->ViewValue !== NULL) { // Load from cache
				$this->tahunajaran_id->EditValue = array_values($this->tahunajaran_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->tahunajaran_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->tahunajaran_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->tahunajaran_id->EditValue = $arwrk;
			}

			// siswa_id
			$this->siswa_id->EditAttrs["class"] = "form-control";
			$this->siswa_id->EditCustomAttributes = "";
			if ($this->siswa_id->getSessionValue() <> "") {
				$this->siswa_id->CurrentValue = $this->siswa_id->getSessionValue();
			$this->siswa_id->ViewValue = $this->siswa_id->CurrentValue;
			$this->siswa_id->ViewValue = FormatNumber($this->siswa_id->ViewValue, 0, -2, -2, -2);
			$this->siswa_id->ViewCustomAttributes = "";
			} else {
			$this->siswa_id->EditValue = HtmlEncode($this->siswa_id->CurrentValue);
			$this->siswa_id->PlaceHolder = RemoveHtml($this->siswa_id->caption());
			}

			// iuran_id
			$this->iuran_id->EditAttrs["class"] = "form-control";
			$this->iuran_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->iuran_id->CurrentValue));
			if ($curVal <> "")
				$this->iuran_id->ViewValue = $this->iuran_id->lookupCacheOption($curVal);
			else
				$this->iuran_id->ViewValue = $this->iuran_id->Lookup !== NULL && is_array($this->iuran_id->Lookup->Options) ? $curVal : NULL;
			if ($this->iuran_id->ViewValue !== NULL) { // Load from cache
				$this->iuran_id->EditValue = array_values($this->iuran_id->Lookup->Options);
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->iuran_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->iuran_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				$arwrk = ($rswrk) ? $rswrk->GetRows() : array();
				if ($rswrk) $rswrk->Close();
				$this->iuran_id->EditValue = $arwrk;
			}

			// Nilai
			$this->Nilai->EditAttrs["class"] = "form-control";
			$this->Nilai->EditCustomAttributes = "";
			$this->Nilai->EditValue = HtmlEncode($this->Nilai->CurrentValue);
			$this->Nilai->PlaceHolder = RemoveHtml($this->Nilai->caption());
			if (strval($this->Nilai->EditValue) <> "" && is_numeric($this->Nilai->EditValue))
				$this->Nilai->EditValue = FormatNumber($this->Nilai->EditValue, -2, -2, -2, -2);

			// Terbayar
			$this->Terbayar->EditAttrs["class"] = "form-control";
			$this->Terbayar->EditCustomAttributes = "";
			$this->Terbayar->EditValue = HtmlEncode($this->Terbayar->CurrentValue);
			$this->Terbayar->PlaceHolder = RemoveHtml($this->Terbayar->caption());
			if (strval($this->Terbayar->EditValue) <> "" && is_numeric($this->Terbayar->EditValue))
				$this->Terbayar->EditValue = FormatNumber($this->Terbayar->EditValue, -2, -2, -2, -2);

			// Sisa
			$this->Sisa->EditAttrs["class"] = "form-control";
			$this->Sisa->EditCustomAttributes = "";
			$this->Sisa->EditValue = HtmlEncode($this->Sisa->CurrentValue);
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

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// tahunajaran_id
			$this->tahunajaran_id->LinkCustomAttributes = "";
			$this->tahunajaran_id->HrefValue = "";

			// siswa_id
			$this->siswa_id->LinkCustomAttributes = "";
			$this->siswa_id->HrefValue = "";

			// iuran_id
			$this->iuran_id->LinkCustomAttributes = "";
			$this->iuran_id->HrefValue = "";

			// Nilai
			$this->Nilai->LinkCustomAttributes = "";
			$this->Nilai->HrefValue = "";

			// Terbayar
			$this->Terbayar->LinkCustomAttributes = "";
			$this->Terbayar->HrefValue = "";

			// Sisa
			$this->Sisa->LinkCustomAttributes = "";
			$this->Sisa->HrefValue = "";

			// P01
			$this->P01->LinkCustomAttributes = "";
			$this->P01->HrefValue = "";

			// P02
			$this->P02->LinkCustomAttributes = "";
			$this->P02->HrefValue = "";

			// P03
			$this->P03->LinkCustomAttributes = "";
			$this->P03->HrefValue = "";

			// P04
			$this->P04->LinkCustomAttributes = "";
			$this->P04->HrefValue = "";

			// P05
			$this->P05->LinkCustomAttributes = "";
			$this->P05->HrefValue = "";

			// P06
			$this->P06->LinkCustomAttributes = "";
			$this->P06->HrefValue = "";

			// P07
			$this->P07->LinkCustomAttributes = "";
			$this->P07->HrefValue = "";

			// P08
			$this->P08->LinkCustomAttributes = "";
			$this->P08->HrefValue = "";

			// P09
			$this->P09->LinkCustomAttributes = "";
			$this->P09->HrefValue = "";

			// P10
			$this->P10->LinkCustomAttributes = "";
			$this->P10->HrefValue = "";

			// P11
			$this->P11->LinkCustomAttributes = "";
			$this->P11->HrefValue = "";

			// P12
			$this->P12->LinkCustomAttributes = "";
			$this->P12->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->id->Required) {
			if (!$this->id->IsDetailKey && $this->id->FormValue != NULL && $this->id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->id->caption(), $this->id->RequiredErrorMessage));
			}
		}
		if ($this->tahunajaran_id->Required) {
			if (!$this->tahunajaran_id->IsDetailKey && $this->tahunajaran_id->FormValue != NULL && $this->tahunajaran_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->tahunajaran_id->caption(), $this->tahunajaran_id->RequiredErrorMessage));
			}
		}
		if ($this->siswa_id->Required) {
			if (!$this->siswa_id->IsDetailKey && $this->siswa_id->FormValue != NULL && $this->siswa_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->siswa_id->caption(), $this->siswa_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->siswa_id->FormValue)) {
			AddMessage($FormError, $this->siswa_id->errorMessage());
		}
		if ($this->iuran_id->Required) {
			if (!$this->iuran_id->IsDetailKey && $this->iuran_id->FormValue != NULL && $this->iuran_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->iuran_id->caption(), $this->iuran_id->RequiredErrorMessage));
			}
		}
		if ($this->Nilai->Required) {
			if (!$this->Nilai->IsDetailKey && $this->Nilai->FormValue != NULL && $this->Nilai->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Nilai->caption(), $this->Nilai->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Nilai->FormValue)) {
			AddMessage($FormError, $this->Nilai->errorMessage());
		}
		if ($this->Terbayar->Required) {
			if (!$this->Terbayar->IsDetailKey && $this->Terbayar->FormValue != NULL && $this->Terbayar->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Terbayar->caption(), $this->Terbayar->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Terbayar->FormValue)) {
			AddMessage($FormError, $this->Terbayar->errorMessage());
		}
		if ($this->Sisa->Required) {
			if (!$this->Sisa->IsDetailKey && $this->Sisa->FormValue != NULL && $this->Sisa->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sisa->caption(), $this->Sisa->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Sisa->FormValue)) {
			AddMessage($FormError, $this->Sisa->errorMessage());
		}
		if ($this->P01->Required) {
			if ($this->P01->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P01->caption(), $this->P01->RequiredErrorMessage));
			}
		}
		if ($this->P02->Required) {
			if ($this->P02->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P02->caption(), $this->P02->RequiredErrorMessage));
			}
		}
		if ($this->P03->Required) {
			if ($this->P03->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P03->caption(), $this->P03->RequiredErrorMessage));
			}
		}
		if ($this->P04->Required) {
			if ($this->P04->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P04->caption(), $this->P04->RequiredErrorMessage));
			}
		}
		if ($this->P05->Required) {
			if ($this->P05->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P05->caption(), $this->P05->RequiredErrorMessage));
			}
		}
		if ($this->P06->Required) {
			if ($this->P06->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P06->caption(), $this->P06->RequiredErrorMessage));
			}
		}
		if ($this->P07->Required) {
			if ($this->P07->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P07->caption(), $this->P07->RequiredErrorMessage));
			}
		}
		if ($this->P08->Required) {
			if ($this->P08->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P08->caption(), $this->P08->RequiredErrorMessage));
			}
		}
		if ($this->P09->Required) {
			if ($this->P09->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P09->caption(), $this->P09->RequiredErrorMessage));
			}
		}
		if ($this->P10->Required) {
			if ($this->P10->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P10->caption(), $this->P10->RequiredErrorMessage));
			}
		}
		if ($this->P11->Required) {
			if ($this->P11->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P11->caption(), $this->P11->RequiredErrorMessage));
			}
		}
		if ($this->P12->Required) {
			if ($this->P12->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->P12->caption(), $this->P12->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($filter);
		$conn = &$this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// tahunajaran_id
			$this->tahunajaran_id->setDbValueDef($rsnew, $this->tahunajaran_id->CurrentValue, 0, $this->tahunajaran_id->ReadOnly);

			// siswa_id
			$this->siswa_id->setDbValueDef($rsnew, $this->siswa_id->CurrentValue, 0, $this->siswa_id->ReadOnly);

			// iuran_id
			$this->iuran_id->setDbValueDef($rsnew, $this->iuran_id->CurrentValue, 0, $this->iuran_id->ReadOnly);

			// Nilai
			$this->Nilai->setDbValueDef($rsnew, $this->Nilai->CurrentValue, 0, $this->Nilai->ReadOnly);

			// Terbayar
			$this->Terbayar->setDbValueDef($rsnew, $this->Terbayar->CurrentValue, 0, $this->Terbayar->ReadOnly);

			// Sisa
			$this->Sisa->setDbValueDef($rsnew, $this->Sisa->CurrentValue, 0, $this->Sisa->ReadOnly);

			// P01
			$tmpBool = $this->P01->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P01->setDbValueDef($rsnew, $tmpBool, 0, $this->P01->ReadOnly);

			// P02
			$tmpBool = $this->P02->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P02->setDbValueDef($rsnew, $tmpBool, 0, $this->P02->ReadOnly);

			// P03
			$tmpBool = $this->P03->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P03->setDbValueDef($rsnew, $tmpBool, 0, $this->P03->ReadOnly);

			// P04
			$tmpBool = $this->P04->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P04->setDbValueDef($rsnew, $tmpBool, 0, $this->P04->ReadOnly);

			// P05
			$tmpBool = $this->P05->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P05->setDbValueDef($rsnew, $tmpBool, 0, $this->P05->ReadOnly);

			// P06
			$tmpBool = $this->P06->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P06->setDbValueDef($rsnew, $tmpBool, 0, $this->P06->ReadOnly);

			// P07
			$tmpBool = $this->P07->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P07->setDbValueDef($rsnew, $tmpBool, 0, $this->P07->ReadOnly);

			// P08
			$tmpBool = $this->P08->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P08->setDbValueDef($rsnew, $tmpBool, 0, $this->P08->ReadOnly);

			// P09
			$tmpBool = $this->P09->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P09->setDbValueDef($rsnew, $tmpBool, 0, $this->P09->ReadOnly);

			// P10
			$tmpBool = $this->P10->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P10->setDbValueDef($rsnew, $tmpBool, 0, $this->P10->ReadOnly);

			// P11
			$tmpBool = $this->P11->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P11->setDbValueDef($rsnew, $tmpBool, 0, $this->P11->ReadOnly);

			// P12
			$tmpBool = $this->P12->CurrentValue;
			if ($tmpBool <> "1" && $tmpBool <> "0")
				$tmpBool = !empty($tmpBool) ? "1" : "0";
			$this->P12->setDbValueDef($rsnew, $tmpBool, 0, $this->P12->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);
			if ($updateRow) {
				$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (Get(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Get(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t0201_siswa") {
				$validMaster = TRUE;
				if (Get("fk_id") !== NULL) {
					$GLOBALS["t0201_siswa"]->id->setQueryStringValue(Get("fk_id"));
					$this->siswa_id->setQueryStringValue($GLOBALS["t0201_siswa"]->id->QueryStringValue);
					$this->siswa_id->setSessionValue($this->siswa_id->QueryStringValue);
					if (!is_numeric($GLOBALS["t0201_siswa"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (Post(TABLE_SHOW_MASTER) !== NULL) {
			$masterTblVar = Post(TABLE_SHOW_MASTER);
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t0201_siswa") {
				$validMaster = TRUE;
				if (Post("fk_id") !== NULL) {
					$GLOBALS["t0201_siswa"]->id->setFormValue(Post("fk_id"));
					$this->siswa_id->setFormValue($GLOBALS["t0201_siswa"]->id->FormValue);
					$this->siswa_id->setSessionValue($this->siswa_id->FormValue);
					if (!is_numeric($GLOBALS["t0201_siswa"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRec = 1;
				$this->setStartRecordNumber($this->StartRec);
			}

			// Clear previous master key from Session
			if ($masterTblVar <> "t0201_siswa") {
				if ($this->siswa_id->CurrentValue == "")
					$this->siswa_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t0202_siswaiuranlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_tahunajaran_id":
							break;
						case "x_iuran_id":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>