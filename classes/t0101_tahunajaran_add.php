<?php
namespace PHPMaker2019\spp_prj;

/**
 * Page class
 */
class t0101_tahunajaran_add extends t0101_tahunajaran
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{45A85772-754E-4F4B-A197-9291CE1FD3F9}";

	// Table name
	public $TableName = 't0101_tahunajaran';

	// Page object name
	public $PageObjName = "t0101_tahunajaran_add";

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

		// Table object (t0101_tahunajaran)
		if (!isset($GLOBALS["t0101_tahunajaran"]) || get_class($GLOBALS["t0101_tahunajaran"]) == PROJECT_NAMESPACE . "t0101_tahunajaran") {
			$GLOBALS["t0101_tahunajaran"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t0101_tahunajaran"];
		}
		$this->CancelUrl = $this->pageUrl() . "action=cancel";

		// Table object (t9996_employees)
		if (!isset($GLOBALS['t9996_employees']))
			$GLOBALS['t9996_employees'] = new t9996_employees();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't0101_tahunajaran');

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
		global $EXPORT, $t0101_tahunajaran;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t0101_tahunajaran);
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
					if ($pageName == "t0101_tahunajaranview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t0101_tahunajaranlist.php"));
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
		$this->id->Visible = FALSE;
		$this->AwalBulan->setVisibility();
		$this->AwalTahun->setVisibility();
		$this->AkhirBulan->setVisibility();
		$this->AkhirTahun->setVisibility();
		$this->TahunAjaran->setVisibility();
		$this->Aktif->setVisibility();
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
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t0101_tahunajaranlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t0101_tahunajaranlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t0101_tahunajaranview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->AwalBulan->CurrentValue = NULL;
		$this->AwalBulan->OldValue = $this->AwalBulan->CurrentValue;
		$this->AwalTahun->CurrentValue = NULL;
		$this->AwalTahun->OldValue = $this->AwalTahun->CurrentValue;
		$this->AkhirBulan->CurrentValue = NULL;
		$this->AkhirBulan->OldValue = $this->AkhirBulan->CurrentValue;
		$this->AkhirTahun->CurrentValue = NULL;
		$this->AkhirTahun->OldValue = $this->AkhirTahun->CurrentValue;
		$this->TahunAjaran->CurrentValue = NULL;
		$this->TahunAjaran->OldValue = $this->TahunAjaran->CurrentValue;
		$this->Aktif->CurrentValue = NULL;
		$this->Aktif->OldValue = $this->Aktif->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'AwalBulan' first before field var 'x_AwalBulan'
		$val = $CurrentForm->hasValue("AwalBulan") ? $CurrentForm->getValue("AwalBulan") : $CurrentForm->getValue("x_AwalBulan");
		if (!$this->AwalBulan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AwalBulan->Visible = FALSE; // Disable update for API request
			else
				$this->AwalBulan->setFormValue($val);
		}

		// Check field name 'AwalTahun' first before field var 'x_AwalTahun'
		$val = $CurrentForm->hasValue("AwalTahun") ? $CurrentForm->getValue("AwalTahun") : $CurrentForm->getValue("x_AwalTahun");
		if (!$this->AwalTahun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AwalTahun->Visible = FALSE; // Disable update for API request
			else
				$this->AwalTahun->setFormValue($val);
		}

		// Check field name 'AkhirBulan' first before field var 'x_AkhirBulan'
		$val = $CurrentForm->hasValue("AkhirBulan") ? $CurrentForm->getValue("AkhirBulan") : $CurrentForm->getValue("x_AkhirBulan");
		if (!$this->AkhirBulan->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AkhirBulan->Visible = FALSE; // Disable update for API request
			else
				$this->AkhirBulan->setFormValue($val);
		}

		// Check field name 'AkhirTahun' first before field var 'x_AkhirTahun'
		$val = $CurrentForm->hasValue("AkhirTahun") ? $CurrentForm->getValue("AkhirTahun") : $CurrentForm->getValue("x_AkhirTahun");
		if (!$this->AkhirTahun->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->AkhirTahun->Visible = FALSE; // Disable update for API request
			else
				$this->AkhirTahun->setFormValue($val);
		}

		// Check field name 'TahunAjaran' first before field var 'x_TahunAjaran'
		$val = $CurrentForm->hasValue("TahunAjaran") ? $CurrentForm->getValue("TahunAjaran") : $CurrentForm->getValue("x_TahunAjaran");
		if (!$this->TahunAjaran->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TahunAjaran->Visible = FALSE; // Disable update for API request
			else
				$this->TahunAjaran->setFormValue($val);
		}

		// Check field name 'Aktif' first before field var 'x_Aktif'
		$val = $CurrentForm->hasValue("Aktif") ? $CurrentForm->getValue("Aktif") : $CurrentForm->getValue("x_Aktif");
		if (!$this->Aktif->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Aktif->Visible = FALSE; // Disable update for API request
			else
				$this->Aktif->setFormValue($val);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->AwalBulan->CurrentValue = $this->AwalBulan->FormValue;
		$this->AwalTahun->CurrentValue = $this->AwalTahun->FormValue;
		$this->AkhirBulan->CurrentValue = $this->AkhirBulan->FormValue;
		$this->AkhirTahun->CurrentValue = $this->AkhirTahun->FormValue;
		$this->TahunAjaran->CurrentValue = $this->TahunAjaran->FormValue;
		$this->Aktif->CurrentValue = $this->Aktif->FormValue;
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
		$this->AwalBulan->setDbValue($row['AwalBulan']);
		$this->AwalTahun->setDbValue($row['AwalTahun']);
		$this->AkhirBulan->setDbValue($row['AkhirBulan']);
		$this->AkhirTahun->setDbValue($row['AkhirTahun']);
		$this->TahunAjaran->setDbValue($row['TahunAjaran']);
		$this->Aktif->setDbValue($row['Aktif']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['AwalBulan'] = $this->AwalBulan->CurrentValue;
		$row['AwalTahun'] = $this->AwalTahun->CurrentValue;
		$row['AkhirBulan'] = $this->AkhirBulan->CurrentValue;
		$row['AkhirTahun'] = $this->AkhirTahun->CurrentValue;
		$row['TahunAjaran'] = $this->TahunAjaran->CurrentValue;
		$row['Aktif'] = $this->Aktif->CurrentValue;
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
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// AwalBulan
		// AwalTahun
		// AkhirBulan
		// AkhirTahun
		// TahunAjaran
		// Aktif

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// AwalBulan
			$this->AwalBulan->ViewValue = $this->AwalBulan->CurrentValue;
			$this->AwalBulan->ViewValue = FormatNumber($this->AwalBulan->ViewValue, 0, -2, -2, -2);
			$this->AwalBulan->ViewCustomAttributes = "";

			// AwalTahun
			$this->AwalTahun->ViewValue = $this->AwalTahun->CurrentValue;
			$this->AwalTahun->ViewValue = FormatNumber($this->AwalTahun->ViewValue, 0, -2, -2, -2);
			$this->AwalTahun->ViewCustomAttributes = "";

			// AkhirBulan
			$this->AkhirBulan->ViewValue = $this->AkhirBulan->CurrentValue;
			$this->AkhirBulan->ViewValue = FormatNumber($this->AkhirBulan->ViewValue, 0, -2, -2, -2);
			$this->AkhirBulan->ViewCustomAttributes = "";

			// AkhirTahun
			$this->AkhirTahun->ViewValue = $this->AkhirTahun->CurrentValue;
			$this->AkhirTahun->ViewValue = FormatNumber($this->AkhirTahun->ViewValue, 0, -2, -2, -2);
			$this->AkhirTahun->ViewCustomAttributes = "";

			// TahunAjaran
			$this->TahunAjaran->ViewValue = $this->TahunAjaran->CurrentValue;
			$this->TahunAjaran->ViewCustomAttributes = "";

			// Aktif
			if (strval($this->Aktif->CurrentValue) <> "") {
				$this->Aktif->ViewValue = $this->Aktif->optionCaption($this->Aktif->CurrentValue);
			} else {
				$this->Aktif->ViewValue = NULL;
			}
			$this->Aktif->ViewCustomAttributes = "";

			// AwalBulan
			$this->AwalBulan->LinkCustomAttributes = "";
			$this->AwalBulan->HrefValue = "";
			$this->AwalBulan->TooltipValue = "";

			// AwalTahun
			$this->AwalTahun->LinkCustomAttributes = "";
			$this->AwalTahun->HrefValue = "";
			$this->AwalTahun->TooltipValue = "";

			// AkhirBulan
			$this->AkhirBulan->LinkCustomAttributes = "";
			$this->AkhirBulan->HrefValue = "";
			$this->AkhirBulan->TooltipValue = "";

			// AkhirTahun
			$this->AkhirTahun->LinkCustomAttributes = "";
			$this->AkhirTahun->HrefValue = "";
			$this->AkhirTahun->TooltipValue = "";

			// TahunAjaran
			$this->TahunAjaran->LinkCustomAttributes = "";
			$this->TahunAjaran->HrefValue = "";
			$this->TahunAjaran->TooltipValue = "";

			// Aktif
			$this->Aktif->LinkCustomAttributes = "";
			$this->Aktif->HrefValue = "";
			$this->Aktif->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// AwalBulan
			$this->AwalBulan->EditAttrs["class"] = "form-control";
			$this->AwalBulan->EditCustomAttributes = "";
			$this->AwalBulan->EditValue = HtmlEncode($this->AwalBulan->CurrentValue);
			$this->AwalBulan->PlaceHolder = RemoveHtml($this->AwalBulan->caption());

			// AwalTahun
			$this->AwalTahun->EditAttrs["class"] = "form-control";
			$this->AwalTahun->EditCustomAttributes = "";
			$this->AwalTahun->EditValue = HtmlEncode($this->AwalTahun->CurrentValue);
			$this->AwalTahun->PlaceHolder = RemoveHtml($this->AwalTahun->caption());

			// AkhirBulan
			$this->AkhirBulan->EditAttrs["class"] = "form-control";
			$this->AkhirBulan->EditCustomAttributes = "";
			$this->AkhirBulan->EditValue = HtmlEncode($this->AkhirBulan->CurrentValue);
			$this->AkhirBulan->PlaceHolder = RemoveHtml($this->AkhirBulan->caption());

			// AkhirTahun
			$this->AkhirTahun->EditAttrs["class"] = "form-control";
			$this->AkhirTahun->EditCustomAttributes = "";
			$this->AkhirTahun->EditValue = HtmlEncode($this->AkhirTahun->CurrentValue);
			$this->AkhirTahun->PlaceHolder = RemoveHtml($this->AkhirTahun->caption());

			// TahunAjaran
			$this->TahunAjaran->EditAttrs["class"] = "form-control";
			$this->TahunAjaran->EditCustomAttributes = "";
			if (REMOVE_XSS)
				$this->TahunAjaran->CurrentValue = HtmlDecode($this->TahunAjaran->CurrentValue);
			$this->TahunAjaran->EditValue = HtmlEncode($this->TahunAjaran->CurrentValue);
			$this->TahunAjaran->PlaceHolder = RemoveHtml($this->TahunAjaran->caption());

			// Aktif
			$this->Aktif->EditCustomAttributes = "";
			$this->Aktif->EditValue = $this->Aktif->options(FALSE);

			// Add refer script
			// AwalBulan

			$this->AwalBulan->LinkCustomAttributes = "";
			$this->AwalBulan->HrefValue = "";

			// AwalTahun
			$this->AwalTahun->LinkCustomAttributes = "";
			$this->AwalTahun->HrefValue = "";

			// AkhirBulan
			$this->AkhirBulan->LinkCustomAttributes = "";
			$this->AkhirBulan->HrefValue = "";

			// AkhirTahun
			$this->AkhirTahun->LinkCustomAttributes = "";
			$this->AkhirTahun->HrefValue = "";

			// TahunAjaran
			$this->TahunAjaran->LinkCustomAttributes = "";
			$this->TahunAjaran->HrefValue = "";

			// Aktif
			$this->Aktif->LinkCustomAttributes = "";
			$this->Aktif->HrefValue = "";
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
		if ($this->AwalBulan->Required) {
			if (!$this->AwalBulan->IsDetailKey && $this->AwalBulan->FormValue != NULL && $this->AwalBulan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AwalBulan->caption(), $this->AwalBulan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->AwalBulan->FormValue)) {
			AddMessage($FormError, $this->AwalBulan->errorMessage());
		}
		if ($this->AwalTahun->Required) {
			if (!$this->AwalTahun->IsDetailKey && $this->AwalTahun->FormValue != NULL && $this->AwalTahun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AwalTahun->caption(), $this->AwalTahun->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->AwalTahun->FormValue)) {
			AddMessage($FormError, $this->AwalTahun->errorMessage());
		}
		if ($this->AkhirBulan->Required) {
			if (!$this->AkhirBulan->IsDetailKey && $this->AkhirBulan->FormValue != NULL && $this->AkhirBulan->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AkhirBulan->caption(), $this->AkhirBulan->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->AkhirBulan->FormValue)) {
			AddMessage($FormError, $this->AkhirBulan->errorMessage());
		}
		if ($this->AkhirTahun->Required) {
			if (!$this->AkhirTahun->IsDetailKey && $this->AkhirTahun->FormValue != NULL && $this->AkhirTahun->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->AkhirTahun->caption(), $this->AkhirTahun->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->AkhirTahun->FormValue)) {
			AddMessage($FormError, $this->AkhirTahun->errorMessage());
		}
		if ($this->TahunAjaran->Required) {
			if (!$this->TahunAjaran->IsDetailKey && $this->TahunAjaran->FormValue != NULL && $this->TahunAjaran->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TahunAjaran->caption(), $this->TahunAjaran->RequiredErrorMessage));
			}
		}
		if ($this->Aktif->Required) {
			if ($this->Aktif->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Aktif->caption(), $this->Aktif->RequiredErrorMessage));
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

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// AwalBulan
		$this->AwalBulan->setDbValueDef($rsnew, $this->AwalBulan->CurrentValue, 0, FALSE);

		// AwalTahun
		$this->AwalTahun->setDbValueDef($rsnew, $this->AwalTahun->CurrentValue, 0, FALSE);

		// AkhirBulan
		$this->AkhirBulan->setDbValueDef($rsnew, $this->AkhirBulan->CurrentValue, 0, FALSE);

		// AkhirTahun
		$this->AkhirTahun->setDbValueDef($rsnew, $this->AkhirTahun->CurrentValue, 0, FALSE);

		// TahunAjaran
		$this->TahunAjaran->setDbValueDef($rsnew, $this->TahunAjaran->CurrentValue, "", FALSE);

		// Aktif
		$this->Aktif->setDbValueDef($rsnew, $this->Aktif->CurrentValue, "", FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t0101_tahunajaranlist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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