<?php
namespace PHPMaker2019\spp_prj;

/**
 * Page class (r0307_pembayaran_summary)
 */
class r0307_pembayaran_summary extends r0307_pembayaran
{

	// Page ID
	public $PageID = 'summary';

	// Project ID
	public $ProjectID = "{1E3116C6-C701-420A-A6D6-A123DF9E6EED}";

	// Page object name
	public $PageObjName = 'r0307_pembayaran_summary';
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;

	// Page headings
	public $Heading = '';
	public $Subheading = '';
	public $PageHeader;
	public $PageFooter;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportPdfUrl;
	public $ExportEmailUrl;

	// CSS
	public $ReportTableClass = "";
	public $ReportTableStyle = "";

	// Custom export
	public $ExportPrintCustom = FALSE;
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Page heading
	public function pageHeading()
	{
		global $ReportLanguage;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "TableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $ReportLanguage;
		if ($this->Subheading <> "")
			return $this->Subheading;
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
		$pageUrl = CurrentPageName() . "?";
		if ($this->UseTokenInUrl) $pageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $pageUrl;
	}

	// Get message
	public function getMessage()
	{
		return @$_SESSION[SESSION_MESSAGE];
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($_SESSION[SESSION_MESSAGE], $v);
	}

	// Get failure message
	public function getFailureMessage()
	{
		return @$_SESSION[SESSION_FAILURE_MESSAGE];
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($_SESSION[SESSION_FAILURE_MESSAGE], $v);
	}

	// Get success message
	public function getSuccessMessage()
	{
		return @$_SESSION[SESSION_SUCCESS_MESSAGE];
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($_SESSION[SESSION_SUCCESS_MESSAGE], $v);
	}

	// Get warning message
	public function getWarningMessage()
	{
		return @$_SESSION[SESSION_WARNING_MESSAGE];
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($_SESSION[SESSION_WARNING_MESSAGE], $v);
	}

	// Clear message
	public function clearMessage()
	{
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$_SESSION[SESSION_MESSAGE] = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
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

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") // Fotoer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
	}

	// Validate page request
	public function isPageRequest()
	{
		if ($this->UseTokenInUrl) {
			if (IsPost())
				return ($this->TableVar == Post("t"));
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
		global $Language, $ReportLanguage, $DashboardReport;
		global $UserTable, $UserTableConn;

		// Initialize
		if (!$DashboardReport)
			$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		$ReportLanguage = new ReportLanguage();
		if ($Language === NULL)
			$Language = $ReportLanguage;

		// Parent constuctor
		parent::__construct();

		// Table object (r0307_pembayaran)
		if (!isset($GLOBALS["r0307_pembayaran"])) {
			$GLOBALS["r0307_pembayaran"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["r0307_pembayaran"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportEmailUrl = $this->pageUrl() . "export=email";

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'summary');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'r0307_pembayaran');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = &$this->getConnection();

		// User table object (t9996_employees_base)
		if (!isset($UserTable)) {
			$UserTable = new t9996_employees_base();
			$UserTableConn = Conn($UserTable->Dbid);
		}

		// Export options
		$this->ExportOptions = new ListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Search options
		$this->SearchOptions = new ListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Filter options
		$this->FilterOptions = new ListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ew-filter-option fr0307_pembayaransummary";

		// Generate report options
		$this->GenerateOptions = new ListOptions();
		$this->GenerateOptions->Tag = "div";
		$this->GenerateOptions->TagClassName = "ew-generate-option";
	}

	// Get export HTML tag
	public function getExportTag($type, $custom = FALSE)
	{
		global $ReportLanguage;
		$exportId = session_id();
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportExcelUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("ExportToExcel") . "</a>";
			else
				return "<a class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToExcel", TRUE)) . "\" href=\"" . $this->ExportExcelUrl . "\">" . $ReportLanguage->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportWordUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("ExportToWord") . "</a>";
			else
				return "<a class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToWord", TRUE)) . "\" href=\"" . $this->ExportWordUrl . "\">" . $ReportLanguage->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "print")) {
			if ($custom)
				return "<a class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportPrintUrl . "', '" . $exportId . "');\">" . $ReportLanguage->phrase("PrinterFriendly") . "</a>";
			else
				return "<a class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly"), TRUE) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("PrinterFriendly", TRUE)) . "\" href=\"" . $this->ExportPrintUrl . "\">" . $ReportLanguage->phrase("PrinterFriendly") . "</a>";
		} elseif (SameText($type, "pdf")) {
			return "<a class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" href=\"" . $this->ExportPdfUrl . "\">" . $ReportLanguage->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "email")) {
			return "<a class=\"ew-export-link ew-email\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToEmail", TRUE)) . "\" id=\"emf_r0307_pembayaran\" href=\"#\" onclick=\"ew.emailDialogShow({ lnk: 'emf_r0307_pembayaran', hdr: ew.language.phrase('ExportToEmail'), url: '$this->ExportEmailUrl', exportid: '$exportId', el: this }); return false;\">" . $ReportLanguage->phrase("ExportToEmail") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Security, $ReportLanguage, $ReportOptions;
		$exportId = session_id();
		$reportTypes = [];

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = TRUE;
		$reportTypes["print"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPrint") : "";

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;
		$reportTypes["excel"] = $item->Visible ? $ReportLanguage->phrase("ReportFormExcel") : "";

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = TRUE;
		$reportTypes["word"] = $item->Visible ? $ReportLanguage->phrase("ReportFormWord") : "";

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;
		$item->Visible = TRUE;
		$reportTypes["pdf"] = $item->Visible ? $ReportLanguage->phrase("ReportFormPdf") : "";

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = FALSE;
		$reportTypes["email"] = $item->Visible ? $ReportLanguage->phrase("ReportFormEmail") : "";

		// Report types
		$ReportOptions["ReportTypes"] = $reportTypes;

		// Drop down button for export
		$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseImageAndText = $this->ExportOptions->UseDropDownButton;
		$this->ExportOptions->DropDownButtonPhrase = $ReportLanguage->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fr0307_pembayaransummary\" href=\"#\">" . $ReportLanguage->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fr0307_pembayaransummary\" href=\"#\">" . $ReportLanguage->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton; // v8
		$this->FilterOptions->DropDownButtonPhrase = $ReportLanguage->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Set up export options (extended)
		$this->setupExportOptionsExt();

		// Hide options for export
		if ($this->isExport()) {
			$this->ExportOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}

		// Set up table class
		if ($this->isExport("word") || $this->isExport("excel") || $this->isExport("pdf"))
			$this->ReportTableClass = "ew-table";
		else
			$this->ReportTableClass = "table ew-table";
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $ReportLanguage;

		// Filter panel button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = $this->FilterApplied ? " active" : " active";
		$item->Body = "<button type=\"button\" class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" title=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-caption=\"" . $ReportLanguage->phrase("SearchBtn", TRUE) . "\" data-toggle=\"button\" data-form=\"fr0307_pembayaransummary\">" . $ReportLanguage->phrase("SearchBtn") . "</button>";
		$item->Visible = TRUE;

		// Reset filter
		$item = &$this->SearchOptions->add("resetfilter");
		$item->Body = "<button type=\"button\" class=\"btn btn-default\" title=\"" . HtmlEncode($ReportLanguage->phrase("ResetAllFilter", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ResetAllFilter", TRUE)) . "\" onclick=\"location='" . CurrentPageName() . "?cmd=reset'\">" . $ReportLanguage->phrase("ResetAllFilter") . "</button>";
		$item->Visible = TRUE && $this->FilterApplied;

		// Button group for reset filter
		$this->SearchOptions->UseButtonGroup = TRUE;

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide options for export
		if ($this->isExport())
			$this->SearchOptions->hideAllOptions();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ReportLanguage, $EXPORT_REPORT, $ExportFileName, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		if ($this->isExport() && array_key_exists($this->Export, $EXPORT_REPORT)) {
			$content = ob_get_contents();
			if (ob_get_length())
				ob_end_clean();

			// Remove all <div data-tagid="..." id="orig..." class="hide">...</div> (for customviewtag export, except "googlemaps")
			if (preg_match_all('/<div\s+data-tagid=[\'"]([\s\S]*?)[\'"]\s+id=[\'"]orig([\s\S]*?)[\'"]\s+class\s*=\s*[\'"]hide[\'"]>([\s\S]*?)<\/div\s*>/i', $content, $divmatches, PREG_SET_ORDER)) {
				foreach ($divmatches as $divmatch) {
					if ($divmatch[1] <> "googlemaps")
						$content = str_replace($divmatch[0], "", $content);
				}
			}
			$fn = $EXPORT_REPORT[$this->Export];
			$saveResponse = $this->$fn($content);
			if (ReportParam("generaterequest") === TRUE) { // Generate report request
				$this->writeGenResponse($saveResponse);
				$url = ""; // Avoid redirect
			}
		}

		// Close connection if not in dashboard
		if (!$DashboardReport)
			CloseConnections();

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();
			SaveDebugMessage();
			header("Location: " . $url);
		}
		if (!$DashboardReport)
			exit();
	}

	// Initialize common variables
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $FilterOptions; // Filter options

	// Recordset
	public $GroupRecordset = NULL;
	public $Recordset = NULL;
	public $DetailRecordCount = 0;

	// Paging variables
	public $RecordIndex = 0; // Record index
	public $RecordCount = 0; // Record count
	public $StartGroup = 0; // Start group
	public $StopGroup = 0; // Stop group
	public $TotalGroups = 0; // Total groups
	public $GroupCount = 0; // Group count
	public $GroupCounter = []; // Group counter
	public $DisplayGroups = 10; // Groups per page
	public $GroupRange = 10;
	public $Sort = "";
	public $Filter = "";
	public $PageFirstGroupFilter = "";
	public $UserIDFilter = "";
	public $DrillDown = FALSE;
	public $DrillDownInPanel = FALSE;
	public $DrillDownList = "";

	// Clear field for ext filter
	public $ExpiredExtendedFilter = "";
	public $PopupName = "";
	public $PopupValue = "";
	public $FilterApplied;
	public $SearchCommand = FALSE;
	public $ShowHeader;
	public $GroupColumnCount = 0;
	public $SubGroupColumnCount = 0;
	public $DetailColumnCount = 0;
	public $Counts;
	public $Columns;
	public $Values;
	public $Summaries;
	public $Minimums;
	public $Maximums;
	public $GrandCounts;
	public $GrandSummaries;
	public $GrandMinimums;
	public $GrandMaximums;
	public $TotalCount;
	public $GrandSummarySetup = FALSE;
	public $GroupIndexes;
	public $DetailRows = [];
	public $TopContentClass = "col-sm-12 ew-top";
	public $LeftContentClass = "ew-left";
	public $CenterContentClass = "col-sm-12 ew-center";
	public $RightContentClass = "ew-right";
	public $BottomContentClass = "col-sm-12 ew-bottom";

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $ExportFileName, $ReportLanguage, $Security, $UserProfile,
			$Security, $FormError, $DrillDownInPanel, $Breadcrumb, $ReportLanguage,
			$DashboardReport, $CustomExportType;
		global $ReportLanguage;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		if (!$Security->isLoggedIn()) $Security->autoLogin(); // Auto login
		$Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel($this->ProjectID . 'r0307_pembayaran');
		$Security->TablePermission_Loaded();
		if (!$Security->canList()) {
			$Security->saveLastUrl();
			$this->setFailureMessage(DeniedMessage()); // Set no permission
			$this->terminate(GetUrl("index.php"));
		}
		$Security->UserID_Loading();
		if ($Security->isLoggedIn()) $Security->loadUserID();
		$Security->UserID_Loaded();
		if ($Security->isLoggedIn() && strval($Security->currentUserID()) == "") {
			$Security->saveLastUrl();
			$this->setFailureMessage(DeniedMessage()); // Set no permission
			$this->terminate(GetUrl("login.php"));
		}

		// Get export parameters
		if (ReportParam("export") !== NULL)
			$this->Export = strtolower(ReportParam("export"));
		$ExportType = $this->Export; // Get export parameter, used in header
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Setup placeholder
		$this->TahunAjaran->PlaceHolder = $this->TahunAjaran->caption();
		$this->Sekolah->PlaceHolder = $this->Sekolah->caption();
		$this->Kelas->PlaceHolder = $this->Kelas->caption();
		$this->NIS->PlaceHolder = $this->NIS->caption();
		$this->Nama->PlaceHolder = $this->Nama->caption();
		$this->Tanggal->PlaceHolder = $this->Tanggal->caption();

		// Setup export options
		$this->setupExportOptions();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			echo $ReportLanguage->phrase("InvalidPostRequest");
			$this->terminate();
			exit();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Set field visibility for detail fields

		$this->TahunAjaran->setVisibility();
		$this->Sekolah->setVisibility();
		$this->Kelas->setVisibility();
		$this->NIS->setVisibility();
		$this->Nama->setVisibility();
		$this->Iuran->setVisibility();
		$this->Jenis->setVisibility();
		$this->Nomor->setVisibility();
		$this->Tanggal->setVisibility();
		$this->Periode1->setVisibility();
		$this->Periode2->setVisibility();
		$this->Jumlah->setVisibility();

		// Aggregate variables
		// 1st dimension = no of groups (level 0 used for grand total)
		// 2nd dimension = no of fields

		$fieldCount = 13;
		$groupCount = 1;
		$this->Values = &InitArray($fieldCount, 0);
		$this->Counts = &Init2DArray($groupCount, $fieldCount, 0);
		$this->Summaries = &Init2DArray($groupCount, $fieldCount, 0);
		$this->Minimums = &Init2DArray($groupCount, $fieldCount, NULL);
		$this->Maximums = &Init2DArray($groupCount, $fieldCount, NULL);
		$this->GrandCounts = &InitArray($fieldCount, 0);
		$this->GrandSummaries = &InitArray($fieldCount, 0);
		$this->GrandMinimums = &InitArray($fieldCount, NULL);
		$this->GrandMaximums = &InitArray($fieldCount, NULL);

		// Set up array if accumulation required: [Accum, SkipNullOrZero]
		$this->Columns = [[FALSE, FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [FALSE,FALSE], [TRUE,FALSE]];

		// Set up groups per page dynamically
		$this->setupDisplayGroups();

		// Set up Breadcrumb
		if (!$this->isExport())
			$this->setupBreadcrumb();

		// Check if search command
		$this->SearchCommand = (Get("cmd", "") == "search");

		// Load default filter values
		$this->loadDefaultFilters();

		// Load custom filters
		$this->Page_FilterLoad();

		// Set up popup filter
		$this->setupPopup();

		// Load group db values if necessary
		$this->loadGroupDbValues();

		// Extended filter
		$extendedFilter = "";

		// Restore filter list
		$this->restoreFilterList();

		// Build extended filter
		$extendedFilter = $this->getExtendedFilter();
		AddFilter($this->Filter, $extendedFilter);

		// Build popup filter
		$popupFilter = $this->getPopupFilter();
		AddFilter($this->Filter, $popupFilter);

		// Check if filter applied
		$this->FilterApplied = $this->checkFilter();

		// Call Page Selecting event
		$this->Page_Selecting($this->Filter);

		// Search options
		$this->setupSearchOptions();

		// Get sort
		$this->Sort = $this->getSort();

		// Get total count
		$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
		$this->TotalGroups = $this->getRecordCount($sql);
		if ($this->DisplayGroups <= 0 || $this->DrillDown || $DashboardReport) // Display all groups
			$this->DisplayGroups = $this->TotalGroups;
		$this->StartGroup = 1;

		// Show header
		$this->ShowHeader = ($this->TotalGroups > 0);

		// Set up start position if not export all
		if ($this->ExportAll && $this->isExport())
			$this->DisplayGroups = $this->TotalGroups;
		else
			$this->setupStartGroup();

		// Set no record found message
		if ($this->TotalGroups == 0) {
			if ($Security->canList()) {
				if ($this->Filter == "0=101") {
					$this->setWarningMessage($ReportLanguage->phrase("EnterSearchCriteria"));
				} else {
					$this->setWarningMessage($ReportLanguage->phrase("NoRecord"));
				}
			} else {
				$this->setWarningMessage(DeniedMessage());
			}
		}

		// Hide export options if export/dashboard report
		if ($this->isExport() || $DashboardReport)
			$this->ExportOptions->hideAllOptions();

		// Hide search/filter options if export/drilldown/dashboard report
		if ($this->isExport() || $this->DrillDown || $DashboardReport) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
			$this->GenerateOptions->hideAllOptions();
		}

		// Get current page records
		$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(), $this->Filter, $this->Sort);
		$this->Recordset = $this->getRecordset($sql, $this->DisplayGroups, $this->StartGroup - 1);
		$this->setupFieldCount();
	}

	// Accummulate summary
	public function accumulateSummary()
	{
		$cntx = count($this->Summaries);
		for ($ix = 0; $ix < $cntx; $ix++) {
			$cnty = count($this->Summaries[$ix]);
			for ($iy = 1; $iy < $cnty; $iy++) {
				if ($this->Columns[$iy][0]) { // Accumulate required
					$valwrk = $this->Values[$iy];
					if ($valwrk === NULL) {
						if (!$this->Columns[$iy][1])
							$this->Counts[$ix][$iy]++;
					} else {
						$accum = (!$this->Columns[$iy][1] || !is_numeric($valwrk) || $valwrk <> 0);
						if ($accum) {
							$this->Counts[$ix][$iy]++;
							if (is_numeric($valwrk)) {
								$this->Summaries[$ix][$iy] += $valwrk;
								if ($this->Minimums[$ix][$iy] === NULL) {
									$this->Minimums[$ix][$iy] = $valwrk;
									$this->Maximums[$ix][$iy] = $valwrk;
								} else {
									if ($this->Minimums[$ix][$iy] > $valwrk)
										$this->Minimums[$ix][$iy] = $valwrk;
									if ($this->Maximums[$ix][$iy] < $valwrk)
										$this->Maximums[$ix][$iy] = $valwrk;
								}
							}
						}
					}
				}
			}
		}
		$cntx = count($this->Summaries);
		for ($ix = 0; $ix < $cntx; $ix++)
			$this->Counts[$ix][0]++;
	}

	// Reset level summary
	public function resetLevelSummary($lvl)
	{

		// Clear summary values
		$cntx = count($this->Summaries);
		for ($ix = $lvl; $ix < $cntx; $ix++) {
			$cnty = count($this->Summaries[$ix]);
			for ($iy = 1; $iy < $cnty; $iy++) {
				$this->Counts[$ix][$iy] = 0;
				if ($this->Columns[$iy][0]) {
					$this->Summaries[$ix][$iy] = 0;
					$this->Minimums[$ix][$iy] = NULL;
					$this->Maximums[$ix][$iy] = NULL;
				}
			}
		}
		$cntx = count($this->Summaries);
		for ($ix = $lvl; $ix < $cntx; $ix++)
			$this->Counts[$ix][0] = 0;

		// Reset record count
		$this->RecordCount = 0;
	}

	// Load row values
	public function loadRowValues($firstRow = FALSE)
	{
		if (!$this->Recordset)
			return;
		if ($firstRow) { // Get first row
				$this->FirstRowData = [];
				$this->FirstRowData["TahunAjaran"] = $this->Recordset->fields('TahunAjaran');
				$this->FirstRowData["Sekolah"] = $this->Recordset->fields('Sekolah');
				$this->FirstRowData["Kelas"] = $this->Recordset->fields('Kelas');
				$this->FirstRowData["NIS"] = $this->Recordset->fields('NIS');
				$this->FirstRowData["Nama"] = $this->Recordset->fields('Nama');
				$this->FirstRowData["Iuran"] = $this->Recordset->fields('Iuran');
				$this->FirstRowData["Jenis"] = $this->Recordset->fields('Jenis');
				$this->FirstRowData["Nomor"] = $this->Recordset->fields('Nomor');
				$this->FirstRowData["Tanggal"] = $this->Recordset->fields('Tanggal');
				$this->FirstRowData["Periode1"] = $this->Recordset->fields('Periode1');
				$this->FirstRowData["Periode2"] = $this->Recordset->fields('Periode2');
				$this->FirstRowData["Jumlah"] = $this->Recordset->fields('Jumlah');
		} else { // Get next row
			$this->Recordset->moveNext();
		}
		if (!$this->Recordset->EOF) {
			$this->TahunAjaran->setDbValue($this->Recordset->fields('TahunAjaran'));
			$this->Sekolah->setDbValue($this->Recordset->fields('Sekolah'));
			$this->Kelas->setDbValue($this->Recordset->fields('Kelas'));
			$this->NIS->setDbValue($this->Recordset->fields('NIS'));
			$this->Nama->setDbValue($this->Recordset->fields('Nama'));
			$this->Iuran->setDbValue($this->Recordset->fields('Iuran'));
			$this->Jenis->setDbValue($this->Recordset->fields('Jenis'));
			$this->Nomor->setDbValue($this->Recordset->fields('Nomor'));
			$this->Tanggal->setDbValue($this->Recordset->fields('Tanggal'));
			$this->Periode1->setDbValue($this->Recordset->fields('Periode1'));
			$this->Periode2->setDbValue($this->Recordset->fields('Periode2'));
			$this->Jumlah->setDbValue($this->Recordset->fields('Jumlah'));
			$this->Values[1] = $this->TahunAjaran->CurrentValue;
			$this->Values[2] = $this->Sekolah->CurrentValue;
			$this->Values[3] = $this->Kelas->CurrentValue;
			$this->Values[4] = $this->NIS->CurrentValue;
			$this->Values[5] = $this->Nama->CurrentValue;
			$this->Values[6] = $this->Iuran->CurrentValue;
			$this->Values[7] = $this->Jenis->CurrentValue;
			$this->Values[8] = $this->Nomor->CurrentValue;
			$this->Values[9] = $this->Tanggal->CurrentValue;
			$this->Values[10] = $this->Periode1->CurrentValue;
			$this->Values[11] = $this->Periode2->CurrentValue;
			$this->Values[12] = $this->Jumlah->CurrentValue;
		} else {
			$this->TahunAjaran->setDbValue("");
			$this->Sekolah->setDbValue("");
			$this->Kelas->setDbValue("");
			$this->NIS->setDbValue("");
			$this->Nama->setDbValue("");
			$this->Iuran->setDbValue("");
			$this->Jenis->setDbValue("");
			$this->Nomor->setDbValue("");
			$this->Tanggal->setDbValue("");
			$this->Periode1->setDbValue("");
			$this->Periode2->setDbValue("");
			$this->Jumlah->setDbValue("");
		}
	}

	// Render row
	public function renderRow()
	{
		global $Security, $ReportLanguage, $Language;
		$conn = &$this->getConnection();
		if (!$this->GrandSummarySetup) { // Get Grand total
			$hasCount = FALSE;
			$hasSummary = FALSE;

			// Get total count from SQL directly
			$sql = BuildReportSql($this->getSqlSelectCount(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
			$rstot = $conn->execute($sql);
			if ($rstot) {
				$this->TotalCount = ($rstot->recordCount() > 1) ? $rstot->recordCount() : $rstot->fields[0];
				$rstot->close();
				$hasCount = TRUE;
			} else {
				$this->TotalCount = 0;
			}

			// Get total from SQL directly
			$sql = BuildReportSql($this->getSqlSelectAggregate(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
			$sql = $this->getSqlAggregatePrefix() . $sql . $this->getSqlAggregateSuffix();
			$rsagg = $conn->execute($sql);
			if ($rsagg) {
				$this->GrandCounts[1] = $this->TotalCount;
				$this->GrandCounts[2] = $this->TotalCount;
				$this->GrandCounts[3] = $this->TotalCount;
				$this->GrandCounts[4] = $this->TotalCount;
				$this->GrandCounts[5] = $this->TotalCount;
				$this->GrandCounts[6] = $this->TotalCount;
				$this->GrandCounts[7] = $this->TotalCount;
				$this->GrandCounts[8] = $this->TotalCount;
				$this->GrandCounts[9] = $this->TotalCount;
				$this->GrandCounts[10] = $this->TotalCount;
				$this->GrandCounts[11] = $this->TotalCount;
				$this->GrandCounts[12] = $this->TotalCount;
				$this->GrandSummaries[12] = $rsagg->fields("sum_jumlah");
				$rsagg->close();
				$hasSummary = TRUE;
			}

			// Accumulate grand summary from detail records
			if (!$hasCount || !$hasSummary) {
				$sql = BuildReportSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(), $this->getSqlHaving(), "", $this->Filter, "");
				$this->Recordset = $conn->execute($sql);
				if ($this->Recordset) {
					$this->loadRowValues(TRUE);
					while (!$this->Recordset->EOF) {
						$this->accumulateGrandSummary();
						$this->loadRowValues();
					}
					$this->Recordset->close();
				}
			}
			$this->GrandSummarySetup = TRUE; // No need to set up again
		}

		// Call Row_Rendering event
		$this->Row_Rendering();
		if ($this->RowType == ROWTYPE_SEARCH) { // Search row
		} elseif ($this->RowType == ROWTYPE_TOTAL && !($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER)) { // Summary row
			PrependClass($this->RowAttrs["class"], ($this->RowTotalType == ROWTOTAL_PAGE || $this->RowTotalType == ROWTOTAL_GRAND) ? "ew-rpt-grp-aggregate" : ""); // Set up row class

			// Jumlah
			$this->Jumlah->SumViewValue = $this->Jumlah->SumValue;
			$this->Jumlah->SumViewValue = FormatNumber($this->Jumlah->SumViewValue, 2, -2, -2, -2);
			$this->Jumlah->CellAttrs["class"] = "text-right";
			$this->Jumlah->CellAttrs["class"] = ($this->RowTotalType == ROWTOTAL_PAGE || $this->RowTotalType == ROWTOTAL_GRAND) ? "ew-rpt-grp-aggregate" : "ew-rpt-grp-summary-" . $this->RowGroupLevel;

			// TahunAjaran
			$this->TahunAjaran->HrefValue = "";

			// Sekolah
			$this->Sekolah->HrefValue = "";

			// Kelas
			$this->Kelas->HrefValue = "";

			// NIS
			$this->NIS->HrefValue = "";

			// Nama
			$this->Nama->HrefValue = "";

			// Iuran
			$this->Iuran->HrefValue = "";

			// Jenis
			$this->Jenis->HrefValue = "";

			// Nomor
			$this->Nomor->HrefValue = "";

			// Tanggal
			$this->Tanggal->HrefValue = "";

			// Periode1
			$this->Periode1->HrefValue = "";

			// Periode2
			$this->Periode2->HrefValue = "";

			// Jumlah
			$this->Jumlah->HrefValue = "";
		} else {
			if ($this->RowTotalType == ROWTOTAL_GROUP && $this->RowTotalSubType == ROWTOTAL_HEADER) {
			} else {
			}

			// TahunAjaran
			$this->TahunAjaran->ViewValue = $this->TahunAjaran->CurrentValue;
			$this->TahunAjaran->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Sekolah
			$this->Sekolah->ViewValue = $this->Sekolah->CurrentValue;
			$this->Sekolah->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Kelas
			$this->Kelas->ViewValue = $this->Kelas->CurrentValue;
			$this->Kelas->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// NIS
			$this->NIS->ViewValue = $this->NIS->CurrentValue;
			$this->NIS->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Nama
			$this->Nama->ViewValue = $this->Nama->CurrentValue;
			$this->Nama->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Iuran
			$this->Iuran->ViewValue = $this->Iuran->CurrentValue;
			$this->Iuran->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Jenis
			$this->Jenis->ViewValue = $this->Jenis->CurrentValue;
			$this->Jenis->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Nomor
			$this->Nomor->ViewValue = $this->Nomor->CurrentValue;
			$this->Nomor->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Tanggal
			$this->Tanggal->ViewValue = $this->Tanggal->CurrentValue;
			$this->Tanggal->ViewValue = FormatDateTime($this->Tanggal->ViewValue, 7);
			$this->Tanggal->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Periode1
			$this->Periode1->ViewValue = $this->Periode1->CurrentValue;
			$this->Periode1->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Periode2
			$this->Periode2->ViewValue = $this->Periode2->CurrentValue;
			$this->Periode2->CellAttrs["class"] = ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// Jumlah
			$this->Jumlah->ViewValue = $this->Jumlah->CurrentValue;
			$this->Jumlah->ViewValue = FormatNumber($this->Jumlah->ViewValue, 2, -2, -2, -2);
			$this->Jumlah->CellAttrs["class"] = "text-right " . ($this->RecordCount % 2 <> 1 ? "ew-table-alt-row" : "ew-table-row");

			// TahunAjaran
			$this->TahunAjaran->HrefValue = "";

			// Sekolah
			$this->Sekolah->HrefValue = "";

			// Kelas
			$this->Kelas->HrefValue = "";

			// NIS
			$this->NIS->HrefValue = "";

			// Nama
			$this->Nama->HrefValue = "";

			// Iuran
			$this->Iuran->HrefValue = "";

			// Jenis
			$this->Jenis->HrefValue = "";

			// Nomor
			$this->Nomor->HrefValue = "";

			// Tanggal
			$this->Tanggal->HrefValue = "";

			// Periode1
			$this->Periode1->HrefValue = "";

			// Periode2
			$this->Periode2->HrefValue = "";

			// Jumlah
			$this->Jumlah->HrefValue = "";
		}

		// Call Cell_Rendered event
		if ($this->RowType == ROWTYPE_TOTAL) { // Summary row

			// Jumlah
			$currentValue = $this->Jumlah->SumValue;
			$viewValue = &$this->Jumlah->SumViewValue;
			$viewAttrs = &$this->Jumlah->ViewAttrs;
			$cellAttrs = &$this->Jumlah->CellAttrs;
			$hrefValue = &$this->Jumlah->HrefValue;
			$linkAttrs = &$this->Jumlah->LinkAttrs;
			$this->Cell_Rendered($this->Jumlah, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);
		} else {

			// TahunAjaran
			$currentValue = $this->TahunAjaran->CurrentValue;
			$viewValue = &$this->TahunAjaran->ViewValue;
			$viewAttrs = &$this->TahunAjaran->ViewAttrs;
			$cellAttrs = &$this->TahunAjaran->CellAttrs;
			$hrefValue = &$this->TahunAjaran->HrefValue;
			$linkAttrs = &$this->TahunAjaran->LinkAttrs;
			$this->Cell_Rendered($this->TahunAjaran, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Sekolah
			$currentValue = $this->Sekolah->CurrentValue;
			$viewValue = &$this->Sekolah->ViewValue;
			$viewAttrs = &$this->Sekolah->ViewAttrs;
			$cellAttrs = &$this->Sekolah->CellAttrs;
			$hrefValue = &$this->Sekolah->HrefValue;
			$linkAttrs = &$this->Sekolah->LinkAttrs;
			$this->Cell_Rendered($this->Sekolah, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Kelas
			$currentValue = $this->Kelas->CurrentValue;
			$viewValue = &$this->Kelas->ViewValue;
			$viewAttrs = &$this->Kelas->ViewAttrs;
			$cellAttrs = &$this->Kelas->CellAttrs;
			$hrefValue = &$this->Kelas->HrefValue;
			$linkAttrs = &$this->Kelas->LinkAttrs;
			$this->Cell_Rendered($this->Kelas, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// NIS
			$currentValue = $this->NIS->CurrentValue;
			$viewValue = &$this->NIS->ViewValue;
			$viewAttrs = &$this->NIS->ViewAttrs;
			$cellAttrs = &$this->NIS->CellAttrs;
			$hrefValue = &$this->NIS->HrefValue;
			$linkAttrs = &$this->NIS->LinkAttrs;
			$this->Cell_Rendered($this->NIS, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Nama
			$currentValue = $this->Nama->CurrentValue;
			$viewValue = &$this->Nama->ViewValue;
			$viewAttrs = &$this->Nama->ViewAttrs;
			$cellAttrs = &$this->Nama->CellAttrs;
			$hrefValue = &$this->Nama->HrefValue;
			$linkAttrs = &$this->Nama->LinkAttrs;
			$this->Cell_Rendered($this->Nama, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Iuran
			$currentValue = $this->Iuran->CurrentValue;
			$viewValue = &$this->Iuran->ViewValue;
			$viewAttrs = &$this->Iuran->ViewAttrs;
			$cellAttrs = &$this->Iuran->CellAttrs;
			$hrefValue = &$this->Iuran->HrefValue;
			$linkAttrs = &$this->Iuran->LinkAttrs;
			$this->Cell_Rendered($this->Iuran, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Jenis
			$currentValue = $this->Jenis->CurrentValue;
			$viewValue = &$this->Jenis->ViewValue;
			$viewAttrs = &$this->Jenis->ViewAttrs;
			$cellAttrs = &$this->Jenis->CellAttrs;
			$hrefValue = &$this->Jenis->HrefValue;
			$linkAttrs = &$this->Jenis->LinkAttrs;
			$this->Cell_Rendered($this->Jenis, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Nomor
			$currentValue = $this->Nomor->CurrentValue;
			$viewValue = &$this->Nomor->ViewValue;
			$viewAttrs = &$this->Nomor->ViewAttrs;
			$cellAttrs = &$this->Nomor->CellAttrs;
			$hrefValue = &$this->Nomor->HrefValue;
			$linkAttrs = &$this->Nomor->LinkAttrs;
			$this->Cell_Rendered($this->Nomor, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Tanggal
			$currentValue = $this->Tanggal->CurrentValue;
			$viewValue = &$this->Tanggal->ViewValue;
			$viewAttrs = &$this->Tanggal->ViewAttrs;
			$cellAttrs = &$this->Tanggal->CellAttrs;
			$hrefValue = &$this->Tanggal->HrefValue;
			$linkAttrs = &$this->Tanggal->LinkAttrs;
			$this->Cell_Rendered($this->Tanggal, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Periode1
			$currentValue = $this->Periode1->CurrentValue;
			$viewValue = &$this->Periode1->ViewValue;
			$viewAttrs = &$this->Periode1->ViewAttrs;
			$cellAttrs = &$this->Periode1->CellAttrs;
			$hrefValue = &$this->Periode1->HrefValue;
			$linkAttrs = &$this->Periode1->LinkAttrs;
			$this->Cell_Rendered($this->Periode1, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Periode2
			$currentValue = $this->Periode2->CurrentValue;
			$viewValue = &$this->Periode2->ViewValue;
			$viewAttrs = &$this->Periode2->ViewAttrs;
			$cellAttrs = &$this->Periode2->CellAttrs;
			$hrefValue = &$this->Periode2->HrefValue;
			$linkAttrs = &$this->Periode2->LinkAttrs;
			$this->Cell_Rendered($this->Periode2, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);

			// Jumlah
			$currentValue = $this->Jumlah->CurrentValue;
			$viewValue = &$this->Jumlah->ViewValue;
			$viewAttrs = &$this->Jumlah->ViewAttrs;
			$cellAttrs = &$this->Jumlah->CellAttrs;
			$hrefValue = &$this->Jumlah->HrefValue;
			$linkAttrs = &$this->Jumlah->LinkAttrs;
			$this->Cell_Rendered($this->Jumlah, $currentValue, $viewValue, $viewAttrs, $cellAttrs, $hrefValue, $linkAttrs);
		}

		// Call Row_Rendered event
		$this->Row_Rendered();
		$this->setupFieldCount();
	}

	// Accummulate grand summary
	protected function accumulateGrandSummary()
	{
		$this->TotalCount++;
		$cntgs = count($this->GrandSummaries);
		for ($iy = 1; $iy < $cntgs; $iy++) {
			if ($this->Columns[$iy][0]) {
				$valwrk = $this->Values[$iy];
				if ($valwrk === NULL || !is_numeric($valwrk)) {
					if (!$this->Columns[$iy][1])
						$this->GrandCounts[$iy]++;
				} else {
					if (!$this->Columns[$iy][1] || $valwrk <> 0) {
						$this->GrandCounts[$iy]++;
						$this->GrandSummaries[$iy] += $valwrk;
						if ($this->GrandMinimums[$iy] === NULL) {
							$this->GrandMinimums[$iy] = $valwrk;
							$this->GrandMaximums[$iy] = $valwrk;
						} else {
							if ($this->GrandMinimums[$iy] > $valwrk)
								$this->GrandMinimums[$iy] = $valwrk;
							if ($this->GrandMaximums[$iy] < $valwrk)
								$this->GrandMaximums[$iy] = $valwrk;
						}
					}
				}
			}
		}
	}

	// Load group db values if necessary
	protected function loadGroupDbValues()
	{
		$conn = &$this->getConnection();
	}

	// Set up popup
	protected function setupPopup()
	{
		global $ReportLanguage;
		$conn = &$this->getConnection();
		if ($this->DrillDown)
			return;

		// Process post back form
		if (IsPost()) {
			$name = Post("popup", ""); // Get popup form name
			if ($name <> "") {
				$arValues = Post("sel_$name");
				$cntValues = is_array($arValues) ? count($arValues) : 0;
				if ($cntValues > 0) {
					if (trim($arValues[0]) == "") // Select all
						$arValues = INIT_VALUE;
					$this->PopupName = $name;
					if (IsAdvancedFilterValue($arValues) || $arValues == INIT_VALUE)
						$this->PopupValue = $arValues;
					if (!MatchedArray($arValues, @$_SESSION["sel_$name"])) {
						if ($this->hasSessionFilterValues($name))
							$this->ExpiredExtendedFilter = $name; // Clear extended filter for this field
					}
					$_SESSION["sel_$name"] = $arValues;
					$_SESSION["rf_$name"] = Post("rf_$name", "");
					$_SESSION["rt_$name"] = Post("rt_$name", "");
					$this->resetPager();
				}
			}

		// Get 'reset' command
		} elseif (Get("cmd") !== NULL) {
			$cmd = Get("cmd");
			if (SameText($cmd, "reset")) {
				$this->resetPager();
			}
		}

		// Load selection criteria to array
	}

	// Setup field count
	protected function setupFieldCount()
	{
		$this->GroupColumnCount = 0;
		$this->SubGroupColumnCount = 0;
		$this->DetailColumnCount = 0;
		if ($this->TahunAjaran->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Sekolah->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Kelas->Visible)
			$this->DetailColumnCount += 1;
		if ($this->NIS->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Nama->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Iuran->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Jenis->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Nomor->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Tanggal->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Periode1->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Periode2->Visible)
			$this->DetailColumnCount += 1;
		if ($this->Jumlah->Visible)
			$this->DetailColumnCount += 1;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/") + 1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', "", $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("summary", $this->TableVar, $url, "", $this->TableVar, TRUE);
	}

	// Set up export options (extended)
	protected function setupExportOptionsExt()
	{
		global $ReportLanguage, $ReportOptions;
		$reportTypes = $ReportOptions["ReportTypes"];
		$item = &$this->ExportOptions->getItem("pdf");
		$item->Visible = TRUE;
		if ($item->Visible)
			$reportTypes["pdf"] = $ReportLanguage->phrase("ReportFormPdf");
		$item->Body = "<a class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" data-caption=\"" . HtmlEncode($ReportLanguage->phrase("ExportToPDF", TRUE)) . "\" href=\"javascript:void(0);\" onclick=\"ew.exportWithCharts(event, '" . $this->ExportPdfUrl . "', '" . session_id() . "');\">" . $ReportLanguage->phrase("ExportToPDF") . "</a>";
		$ReportOptions["ReportTypes"] = $reportTypes;
	}

	// Export to HTML
	public function exportHtml($html)
	{

		//global $ExportFileName;
		//header('Content-Type: text/html' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
		//header('Content-Disposition: attachment; filename=' . $ExportFileName . '.html');

		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";

		// Save generate file for print
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
			$baseTag = "<base href=\"" . BaseUrl() . "\">";
			$html = preg_replace('/<head>/', '<head>' . $baseTag, $html);
			SaveFile($folder, $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file")
			Write($html);
		return $saveToFile;
	}

	// Export to Word
	public function exportWord($html)
	{
		global $ExportFileName;
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
		 	SaveFile(ServerMapPath($folder), $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			AddHeader('Content-Type', 'application/vnd.ms-word' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
			AddHeader('Content-Disposition', 'attachment; filename=' . $ExportFileName . '.doc');
			Write($html);
		}
		return $saveToFile;
	}

	// Export to Excel
	public function exportExcel($html)
	{
		global $ExportFileName;
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
		 	SaveFile(ServerMapPath($folder), $fileName, $html);
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			AddHeader('Content-Type', 'application/vnd.ms-excel' . (PROJECT_CHARSET <> '' ? ';charset=' . PROJECT_CHARSET : ''));
			AddHeader('Content-Disposition', 'attachment; filename=' . $ExportFileName . '.xls');
			Write($html);
		}
		return $saveToFile;
	}

	// Export PDF
	public function exportPdf($html)
	{
		global $ExportFileName, $PDF_MEMORY_LIMIT, $PDF_TIME_LIMIT, $PDF_IMAGE_SCALE_FACTOR;
		@ini_set("memory_limit", $PDF_MEMORY_LIMIT);
		set_time_limit($PDF_TIME_LIMIT);
		$html = CheckHtml($html);
		if (DEBUG_ENABLED) // Add debug message
			$html = str_replace("</body>", GetDebugMessage() . "</body>", $html);
		$dompdf = new \Dompdf\Dompdf(["pdf_backend" => "Cpdf"]);
		$doc = new \DOMDocument("1.0", "utf-8");
		@$doc->loadHTML('<?xml encoding="uft-8">' . ConvertToUtf8($html)); // Convert to utf-8
		$spans = $doc->getElementsByTagName("span");
		foreach ($spans as $span) {
			$classNames = $span->getAttribute("class");
			if ($classNames == "ew-filter-caption") // Insert colon
				$span->parentNode->insertBefore($doc->createElement("span", ":&nbsp;"), $span->nextSibling);
			elseif (preg_match('/\bicon\-\w+\b/', $classNames)) // Remove icons
				$span->parentNode->removeChild($span);
		}
		$images = $doc->getElementsByTagName("img");
		$pageSize = "a4";
		$pageOrientation = "portrait";
		$this->ExportPageOrientation = $pageOrientation;
		$portrait = SameText($pageOrientation, "portrait");
		foreach ($images as $image) {
			$imagefn = $image->getAttribute("src");
			if (file_exists($imagefn)) {
				$imagefn = realpath($imagefn);
				$size = getimagesize($imagefn); // Get image size
				if ($size[0] <> 0) {
					if (SameText($pageSize, "letter")) { // Letter paper (8.5 in. by 11 in.)
						$w = $portrait ? 216 : 279;
					} elseif (SameText($pageSize, "legal")) { // Legal paper (8.5 in. by 14 in.)
						$w = $portrait ? 216 : 356;
					} else {
						$w = $portrait ? 210 : 297; // A4 paper (210 mm by 297 mm)
					}
					$w = min($size[0], ($w - 20 * 2) / 25.4 * 72 * $PDF_IMAGE_SCALE_FACTOR); // Resize image, adjust the scale factor if necessary
					$h = $w / $size[0] * $size[1];
					$image->setAttribute("width", $w);
					$image->setAttribute("height", $h);
				}
			}
		}
		$html = $doc->saveHTML();
		$html = ConvertFromUtf8($html);
		$dompdf->load_html($html);
		$dompdf->set_paper($pageSize, $pageOrientation);
		$dompdf->render();
		$folder = ReportParam("folder", "");
		$fileName = ReportParam("filename", "");
		$responseType = ReportParam("responsetype", "");
		$saveToFile = "";
		if ($folder <> "" && $fileName <> "" && ($responseType == "json" || $responseType == "file" && REPORT_SAVE_OUTPUT_ON_SERVER)) {
			SaveFile(ServerMapPath($folder), $fileName, $dompdf->output());
			$saveToFile = UploadPath(FALSE, $folder) . $fileName;
		}
		if ($saveToFile == "" || $responseType == "file") {
			AddHeader('Set-Cookie', 'fileDownload=true; path=/');
			$exportFile = EndsText(".pdf", $ExportFileName) ? $ExportFileName : $ExportFileName . ".pdf";
			$dompdf->stream($exportFile, ["Attachment" => 1]); // 0 to open in browser, 1 to download
		}
		DeleteTempImages($html);
		return $saveToFile;
	}

	// Set up starting group
	protected function setupStartGroup()
	{

		// Exit if no groups
		if ($this->DisplayGroups == 0)
			return;
		$startGrp = ReportParam(TABLE_START_GROUP, "");
		$pageNo = ReportParam("pageno", "");

		// Check for a 'start' parameter
		if ($startGrp != "") {
			$this->StartGroup = $startGrp;
			$this->setStartGroup($this->StartGroup);
		} elseif ($pageNo != "") {
			if (is_numeric($pageNo)) {
				$this->StartGroup = ($pageNo - 1) * $this->DisplayGroups + 1;
				if ($this->StartGroup <= 0) {
					$this->StartGroup = 1;
				} elseif ($this->StartGroup >= intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1) {
					$this->StartGroup = intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1;
				}
				$this->setStartGroup($this->StartGroup);
			} else {
				$this->StartGroup = $this->getStartGroup();
			}
		} else {
			$this->StartGroup = $this->getStartGroup();
		}

		// Check if correct start group counter
		if (!is_numeric($this->StartGroup) || $this->StartGroup == "") { // Avoid invalid start group counter
			$this->StartGroup = 1; // Reset start group counter
			$this->setStartGroup($this->StartGroup);
		} elseif (intval($this->StartGroup) > intval($this->TotalGroups)) { // Avoid starting group > total groups
			$this->StartGroup = intval(($this->TotalGroups - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1; // Point to last page first group
			$this->setStartGroup($this->StartGroup);
		} elseif (($this->StartGroup-1) % $this->DisplayGroups <> 0) {
			$this->StartGroup = intval(($this->StartGroup - 1) / $this->DisplayGroups) * $this->DisplayGroups + 1; // Point to page boundary
			$this->setStartGroup($this->StartGroup);
		}
	}

	// Reset pager
	protected function resetPager()
	{

		// Reset start position (reset command)
		$this->StartGroup = 1;
		$this->setStartGroup($this->StartGroup);
	}

	// Set up number of groups displayed per page
	protected function setupDisplayGroups()
	{
		if (ReportParam(TABLE_GROUP_PER_PAGE) !== NULL) {
			$wrk = ReportParam(TABLE_GROUP_PER_PAGE);
			if (is_numeric($wrk)) {
				$this->DisplayGroups = intval($wrk);
			} else {
				if (strtoupper($wrk) == "ALL") { // Display all groups
					$this->DisplayGroups = -1;
				} else {
					$this->DisplayGroups = 10; // Non-numeric, load default
				}
			}
			$this->setGroupPerPage($this->DisplayGroups); // Save to session

			// Reset start position (reset command)
			$this->StartGroup = 1;
			$this->setStartGroup($this->StartGroup);
		} else {
			if ($this->getGroupPerPage() <> "") {
				$this->DisplayGroups = $this->getGroupPerPage(); // Restore from session
			} else {
				$this->DisplayGroups = 10; // Load default
			}
		}
	}

	// Get sort parameters based on sort links clicked
	protected function getSort()
	{
		if ($this->DrillDown)
			return "";
		$resetSort = ReportParam("cmd") === "resetsort";
		$orderBy = ReportParam("order", "");
		$orderType = ReportParam("ordertype", "");

		// Check for Ctrl pressed
		$ctrl = (ReportParam("ctrl") !== NULL);

		// Check for a resetsort command
		if ($resetSort) {
			$this->setOrderBy("");
			$this->setStartGroup(1);
			$this->TahunAjaran->setSort("");
			$this->Sekolah->setSort("");
			$this->Kelas->setSort("");
			$this->NIS->setSort("");
			$this->Nama->setSort("");
			$this->Iuran->setSort("");
			$this->Jenis->setSort("");
			$this->Nomor->setSort("");
			$this->Tanggal->setSort("");
			$this->Periode1->setSort("");
			$this->Periode2->setSort("");
			$this->Jumlah->setSort("");

		// Check for an Order parameter
		} elseif ($orderBy <> "") {
			$this->CurrentOrder = $orderBy;
			$this->CurrentOrderType = $orderType;
			$this->updateSort($this->TahunAjaran, $ctrl); // TahunAjaran
			$this->updateSort($this->Sekolah, $ctrl); // Sekolah
			$this->updateSort($this->Kelas, $ctrl); // Kelas
			$this->updateSort($this->NIS, $ctrl); // NIS
			$this->updateSort($this->Nama, $ctrl); // Nama
			$this->updateSort($this->Iuran, $ctrl); // Iuran
			$this->updateSort($this->Jenis, $ctrl); // Jenis
			$this->updateSort($this->Nomor, $ctrl); // Nomor
			$this->updateSort($this->Tanggal, $ctrl); // Tanggal
			$this->updateSort($this->Periode1, $ctrl); // Periode1
			$this->updateSort($this->Periode2, $ctrl); // Periode2
			$this->updateSort($this->Jumlah, $ctrl); // Jumlah
			$sortSql = $this->sortSql();
			$this->setOrderBy($sortSql);
			$this->setStartGroup(1);
		}
		return $this->getOrderBy();
	}

	// Return extended filter
	protected function getExtendedFilter()
	{
		global $FormError;
		$filter = "";
		if ($this->DrillDown)
			return "";
		$postBack = IsPost();
		$restoreSession = TRUE;
		$setupFilter = FALSE;

		// Reset extended filter if filter changed
		if ($postBack) {

		// Reset search command
		} elseif (Get("cmd", "") == "reset") {

			// Load default values
			$this->setSessionFilterValues($this->TahunAjaran->AdvancedSearch->SearchValue, $this->TahunAjaran->AdvancedSearch->SearchOperator, $this->TahunAjaran->AdvancedSearch->SearchCondition, $this->TahunAjaran->AdvancedSearch->SearchValue2, $this->TahunAjaran->AdvancedSearch->SearchOperator2, "TahunAjaran"); // Field TahunAjaran
			$this->setSessionFilterValues($this->Sekolah->AdvancedSearch->SearchValue, $this->Sekolah->AdvancedSearch->SearchOperator, $this->Sekolah->AdvancedSearch->SearchCondition, $this->Sekolah->AdvancedSearch->SearchValue2, $this->Sekolah->AdvancedSearch->SearchOperator2, "Sekolah"); // Field Sekolah
			$this->setSessionFilterValues($this->Kelas->AdvancedSearch->SearchValue, $this->Kelas->AdvancedSearch->SearchOperator, $this->Kelas->AdvancedSearch->SearchCondition, $this->Kelas->AdvancedSearch->SearchValue2, $this->Kelas->AdvancedSearch->SearchOperator2, "Kelas"); // Field Kelas
			$this->setSessionFilterValues($this->NIS->AdvancedSearch->SearchValue, $this->NIS->AdvancedSearch->SearchOperator, $this->NIS->AdvancedSearch->SearchCondition, $this->NIS->AdvancedSearch->SearchValue2, $this->NIS->AdvancedSearch->SearchOperator2, "NIS"); // Field NIS
			$this->setSessionFilterValues($this->Nama->AdvancedSearch->SearchValue, $this->Nama->AdvancedSearch->SearchOperator, $this->Nama->AdvancedSearch->SearchCondition, $this->Nama->AdvancedSearch->SearchValue2, $this->Nama->AdvancedSearch->SearchOperator2, "Nama"); // Field Nama
			$this->setSessionFilterValues($this->Tanggal->AdvancedSearch->SearchValue, $this->Tanggal->AdvancedSearch->SearchOperator, $this->Tanggal->AdvancedSearch->SearchCondition, $this->Tanggal->AdvancedSearch->SearchValue2, $this->Tanggal->AdvancedSearch->SearchOperator2, "Tanggal"); // Field Tanggal

			//$setupFilter = TRUE; // No need to set up, just use default
		} else {
			$restoreSession = !$this->SearchCommand;

			// Field TahunAjaran
			if ($this->getFilterValues($this->TahunAjaran)) {
				$setupFilter = TRUE;
			}

			// Field Sekolah
			if ($this->getFilterValues($this->Sekolah)) {
				$setupFilter = TRUE;
			}

			// Field Kelas
			if ($this->getFilterValues($this->Kelas)) {
				$setupFilter = TRUE;
			}

			// Field NIS
			if ($this->getFilterValues($this->NIS)) {
				$setupFilter = TRUE;
			}

			// Field Nama
			if ($this->getFilterValues($this->Nama)) {
				$setupFilter = TRUE;
			}

			// Field Tanggal
			if ($this->getFilterValues($this->Tanggal)) {
				$setupFilter = TRUE;
			}
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				return $filter;
			}
		}

		// Restore session
		if ($restoreSession) {
			$this->getSessionFilterValues($this->TahunAjaran); // Field TahunAjaran
			$this->getSessionFilterValues($this->Sekolah); // Field Sekolah
			$this->getSessionFilterValues($this->Kelas); // Field Kelas
			$this->getSessionFilterValues($this->NIS); // Field NIS
			$this->getSessionFilterValues($this->Nama); // Field Nama
			$this->getSessionFilterValues($this->Tanggal); // Field Tanggal
		}

		// Call page filter validated event
		$this->Page_FilterValidated();

		// Build SQL
		$this->buildExtendedFilter($this->TahunAjaran, $filter, FALSE, TRUE); // Field TahunAjaran
		$this->buildExtendedFilter($this->Sekolah, $filter, FALSE, TRUE); // Field Sekolah
		$this->buildExtendedFilter($this->Kelas, $filter, FALSE, TRUE); // Field Kelas
		$this->buildExtendedFilter($this->NIS, $filter, FALSE, TRUE); // Field NIS
		$this->buildExtendedFilter($this->Nama, $filter, FALSE, TRUE); // Field Nama
		$this->buildExtendedFilter($this->Tanggal, $filter, FALSE, TRUE); // Field Tanggal

		// Save parms to session
		$this->setSessionFilterValues($this->TahunAjaran->AdvancedSearch->SearchValue, $this->TahunAjaran->AdvancedSearch->SearchOperator, $this->TahunAjaran->AdvancedSearch->SearchCondition, $this->TahunAjaran->AdvancedSearch->SearchValue2, $this->TahunAjaran->AdvancedSearch->SearchOperator2, "TahunAjaran"); // Field TahunAjaran
		$this->setSessionFilterValues($this->Sekolah->AdvancedSearch->SearchValue, $this->Sekolah->AdvancedSearch->SearchOperator, $this->Sekolah->AdvancedSearch->SearchCondition, $this->Sekolah->AdvancedSearch->SearchValue2, $this->Sekolah->AdvancedSearch->SearchOperator2, "Sekolah"); // Field Sekolah
		$this->setSessionFilterValues($this->Kelas->AdvancedSearch->SearchValue, $this->Kelas->AdvancedSearch->SearchOperator, $this->Kelas->AdvancedSearch->SearchCondition, $this->Kelas->AdvancedSearch->SearchValue2, $this->Kelas->AdvancedSearch->SearchOperator2, "Kelas"); // Field Kelas
		$this->setSessionFilterValues($this->NIS->AdvancedSearch->SearchValue, $this->NIS->AdvancedSearch->SearchOperator, $this->NIS->AdvancedSearch->SearchCondition, $this->NIS->AdvancedSearch->SearchValue2, $this->NIS->AdvancedSearch->SearchOperator2, "NIS"); // Field NIS
		$this->setSessionFilterValues($this->Nama->AdvancedSearch->SearchValue, $this->Nama->AdvancedSearch->SearchOperator, $this->Nama->AdvancedSearch->SearchCondition, $this->Nama->AdvancedSearch->SearchValue2, $this->Nama->AdvancedSearch->SearchOperator2, "Nama"); // Field Nama
		$this->setSessionFilterValues($this->Tanggal->AdvancedSearch->SearchValue, $this->Tanggal->AdvancedSearch->SearchOperator, $this->Tanggal->AdvancedSearch->SearchCondition, $this->Tanggal->AdvancedSearch->SearchValue2, $this->Tanggal->AdvancedSearch->SearchOperator2, "Tanggal"); // Field Tanggal

		// Setup filter
		if ($setupFilter) {
		}
		return $filter;
	}

	// Build dropdown filter
	protected function buildDropDownFilter(&$fld, &$filterClause, $fldOpr, $default = FALSE, $saveFilter = FALSE)
	{
		$fldVal = ($default) ? $fld->DefaultDropDownValue : $fld->DropDownValue;
		$sql = "";
		if (is_array($fldVal)) {
			foreach ($fldVal as $val) {
				$wrk = $this->getDropDownFilter($fld, $val, $fldOpr);

				// Call Page Filtering event
				if (!StartsString("@@", $val))
					$this->Page_Filtering($fld, $wrk, "dropdown", $fldOpr, $val);
				if ($wrk <> "") {
					if ($sql <> "")
						$sql .= " OR " . $wrk;
					else
						$sql = $wrk;
				}
			}
		} else {
			$sql = $this->getDropDownFilter($fld, $fldVal, $fldOpr);

			// Call Page Filtering event
			if (!StartsString("@@", $fldVal))
				$this->Page_Filtering($fld, $sql, "dropdown", $fldOpr, $fldVal);
		}
		if ($sql <> "") {
			AddFilter($filterClause, $sql);
			if ($saveFilter) $fld->CurrentFilter = $sql;
		}
	}

	// Get dropdown filter
	protected function getDropDownFilter(&$fld, $fldVal, $fldOpr)
	{
		$fldName = $fld->Name;
		$fldExpression = $fld->Expression;
		$fldDataType = $fld->DataType;
		$fldDelimiter = $fld->Delimiter;
		$fldVal = strval($fldVal);
		if ($fldOpr == "") $fldOpr = "=";
		$wrk = "";
		if (SameString($fldVal, NULL_VALUE)) {
			$wrk = $fldExpression . " IS NULL";
		} elseif (SameString($fldVal, NOT_NULL_VALUE)) {
			$wrk = $fldExpression . " IS NOT NULL";
		} elseif (SameString($fldVal, EMPTY_VALUE)) {
			$wrk = $fldExpression . " = ''";
		} elseif (SameString($fldVal, ALL_VALUE)) {
			$wrk = "1 = 1";
		} else {
			if (StartsString("@@", $fldVal)) {
				$wrk = $this->getCustomFilter($fld, $fldVal, $this->Dbid);
			} elseif ($fldDelimiter <> "" && trim($fldVal) <> "" && ($fldDataType == DATATYPE_STRING || $fldDataType == DATATYPE_MEMO)) {
				$wrk = GetMultiValueSearchSql($fldExpression, trim($fldVal), $this->Dbid);
			} else {
				if ($fldVal <> "" && $fldVal <> INIT_VALUE) {
					if ($fldDataType == DATATYPE_DATE && $fldOpr <> "") {
						$wrk = GetDateFilterSql($fldExpression, $fldOpr, $fldVal, $fldDataType, $this->Dbid);
					} else {
						$wrk = GetFilterSql($fldOpr, $fldVal, $fldDataType, $this->Dbid);
						if ($wrk <> "") $wrk = $fldExpression . $wrk;
					}
				}
			}
		}
		return $wrk;
	}

	// Get custom filter
	protected function getCustomFilter(&$fld, $fldVal, $dbid = 0)
	{
		$wrk = "";
		if (is_array($fld->AdvancedFilters)) {
			foreach ($fld->AdvancedFilters as $filter) {
				if ($filter->ID == $fldVal && $filter->Enabled) {
					$fldExpr = $fld->Expression;
					$fn = $filter->FunctionName;
					$wrkid = StartsString("@@", $filter->ID) ? substr($filter->ID, 2) : $filter->ID;
					if ($fn <> "") {
						$fn = PROJECT_NAMESPACE . $fn;
						$wrk = $fn($fldExpr, $dbid);
					} else
						$wrk = "";
					$this->Page_Filtering($fld, $wrk, "custom", $wrkid);
					break;
				}
			}
		}
		return $wrk;
	}

	// Build extended filter
	protected function buildExtendedFilter(&$fld, &$filterClause, $default = FALSE, $saveFilter = FALSE)
	{
		$wrk = GetExtendedFilter($fld, $default, $this->Dbid);
		if (!$default)
			$this->Page_Filtering($fld, $wrk, "extended", $fld->AdvancedSearch->SearchOperator, $fld->AdvancedSearch->SearchValue, $fld->AdvancedSearch->SearchCondition, $fld->AdvancedSearch->SearchOperator2, $fld->AdvancedSearch->SearchValue2);
		if ($wrk <> "") {
			AddFilter($filterClause, $wrk);
			if ($saveFilter) $fld->CurrentFilter = $wrk;
		}
	}

	// Get drop down value from querystring
	protected function getDropDownValue(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		if (IsPost())
			return FALSE; // Skip post back
		$opr = Get("z_$parm");
		if ($opr !== NULL)
			$fld->AdvancedSearch->SearchOperator = $opr;
		$val = Get("x_$parm");
		if ($val !== NULL) {
			if ($fld->isMultiSelect() && !is_array($val)) // Split values for modal lookup
				$fld->DropDownValue = explode(LOOKUP_FILTER_VALUE_SEPARATOR, $val);
			else
				$fld->DropDownValue = $val;
			return TRUE;
		}
		return FALSE;
	}

	// Get filter values from querystring
	protected function getFilterValues(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		if (IsPost())
			return; // Skip post back
		$got = FALSE;
		if (Get("x_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchValue = Get("x_$parm");
			$got = TRUE;
		}
		if (Get("z_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchOperator = Get("z_$parm");
			$got = TRUE;
		}
		if (Get("v_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchCondition = Get("v_$parm");
			$got = TRUE;
		}
		if (Get("y_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchValue2 = Get("y_$parm");
			$got = TRUE;
		}
		if (Get("w_$parm") !== NULL) {
			$fld->AdvancedSearch->SearchOperator2 = Get("w_$parm");
			$got = TRUE;
		}
		return $got;
	}

	// Set default ext filter
	protected function setDefaultExtFilter(&$fld, $so1, $sv1, $sc, $so2, $sv2)
	{
		$fld->AdvancedSearch->SearchValueDefault = $sv1; // Default ext filter value 1
		$fld->AdvancedSearch->SearchValue2Default = $sv2; // Default ext filter value 2 (if operator 2 is enabled)
		$fld->AdvancedSearch->SearchOperatorDefault = $so1; // Default search operator 1
		$fld->AdvancedSearch->SearchOperator2Default = $so2; // Default search operator 2 (if operator 2 is enabled)
		$fld->AdvancedSearch->SearchConditionDefault = $sc; // Default search condition (if operator 2 is enabled)
	}

	// Apply default ext filter
	protected function applyDefaultExtFilter(&$fld)
	{
		$fld->AdvancedSearch->SearchValue = $fld->AdvancedSearch->SearchValueDefault;
		$fld->AdvancedSearch->SearchValue2 = $fld->AdvancedSearch->SearchValue2Default;
		$fld->AdvancedSearch->SearchOperator = $fld->AdvancedSearch->SearchOperatorDefault;
		$fld->AdvancedSearch->SearchOperator2 = $fld->AdvancedSearch->SearchOperator2Default;
		$fld->AdvancedSearch->SearchCondition = $fld->AdvancedSearch->SearchConditionDefault;
	}

	// Check if Text Filter applied
	protected function textFilterApplied(&$fld)
	{
		return (strval($fld->AdvancedSearch->SearchValue) <> strval($fld->AdvancedSearch->SearchValueDefault) ||
			strval($fld->AdvancedSearch->SearchValue2) <> strval($fld->AdvancedSearch->SearchValue2Default) ||
			(strval($fld->AdvancedSearch->SearchValue) <> "" &&
				strval($fld->AdvancedSearch->SearchOperator) <> strval($fld->AdvancedSearch->SearchOperatorDefault)) ||
			(strval($fld->AdvancedSearch->SearchValue2) <> "" &&
				strval($fld->AdvancedSearch->SearchOperator2) <> strval($fld->AdvancedSearch->SearchOperator2Default)) ||
			strval($fld->AdvancedSearch->SearchCondition) <> strval($fld->AdvancedSearch->SearchConditionDefault));
	}

	// Check if Non-Text Filter applied
	protected function nonTextFilterApplied(&$fld)
	{
		if (is_array($fld->DropDownValue)) {
			if (is_array($fld->DefaultDropDownValue)) {
				if (count($fld->DefaultDropDownValue) <> count($fld->DropDownValue))
					return TRUE;
				else
					return (count(array_diff($fld->DefaultDropDownValue, $fld->DropDownValue)) <> 0);
			} else {
				return TRUE;
			}
		} else {
			if (is_array($fld->DefaultDropDownValue))
				return TRUE;
			else
				$v1 = strval($fld->DefaultDropDownValue);
			if ($v1 == INIT_VALUE)
				$v1 = "";
			$v2 = strval($fld->DropDownValue);
			if ($v2 == INIT_VALUE || $v2 == ALL_VALUE)
				$v2 = "";
			return ($v1 <> $v2);
		}
	}

	// Get dropdown value from session
	protected function getSessionDropDownValue(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		$this->getSessionValue($fld->DropDownValue, 'x_r0307_pembayaran_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator, 'z_r0307_pembayaran_' . $parm);
	}

	// Get filter values from session
	protected function getSessionFilterValues(&$fld)
	{
		$parm = substr($fld->FieldVar, 2);
		$this->getSessionValue($fld->AdvancedSearch->SearchValue, 'x_r0307_pembayaran_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator, 'z_r0307_pembayaran_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchCondition, 'v_r0307_pembayaran_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchValue2, 'y_r0307_pembayaran_' . $parm);
		$this->getSessionValue($fld->AdvancedSearch->SearchOperator2, 'w_r0307_pembayaran_' . $parm);
	}

	// Get value from session
	protected function getSessionValue(&$sv, $sn)
	{
		if (array_key_exists($sn, $_SESSION))
			$sv = $_SESSION[$sn];
	}

	// Set dropdown value to session
	protected function setSessionDropDownValue($sv, $so, $parm)
	{
		$_SESSION['x_r0307_pembayaran_' . $parm] = $sv;
		$_SESSION['z_r0307_pembayaran_' . $parm] = $so;
	}

	// Set filter values to session
	protected function setSessionFilterValues($sv1, $so1, $sc, $sv2, $so2, $parm)
	{
		$_SESSION['x_r0307_pembayaran_' . $parm] = $sv1;
		$_SESSION['z_r0307_pembayaran_' . $parm] = $so1;
		$_SESSION['v_r0307_pembayaran_' . $parm] = $sc;
		$_SESSION['y_r0307_pembayaran_' . $parm] = $sv2;
		$_SESSION['w_r0307_pembayaran_' . $parm] = $so2;
	}

	// Check if has session filter values
	protected function hasSessionFilterValues($parm)
	{
		return (@$_SESSION['x_' . $parm] <> "" && @$_SESSION['x_' . $parm] <> INIT_VALUE ||
			@$_SESSION['x_' . $parm] <> "" && @$_SESSION['x_' . $parm] <> INIT_VALUE ||
			@$_SESSION['y_' . $parm] <> "" && @$_SESSION['y_' . $parm] <> INIT_VALUE);
	}

	// Dropdown filter exist
	protected function dropDownFilterExist(&$fld, $fldOpr)
	{
		$wrk = "";
		$this->buildDropDownFilter($fld, $wrk, $fldOpr);
		return ($wrk <> "");
	}

	// Extended filter exist
	protected function extendedFilterExist(&$fld)
	{
		$extWrk = "";
		$this->buildExtendedFilter($fld, $extWrk);
		return ($extWrk <> "");
	}

	// Validate form
	protected function validateForm()
	{
		global $ReportLanguage, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if (!EURODATE($this->Tanggal->AdvancedSearch->SearchValue)) {
			AddMessage($FormError, $this->Tanggal->errorMessage());
		}
		if (!EURODATE($this->Tanggal->AdvancedSearch->SearchValue2)) {
			AddMessage($FormError, $this->Tanggal->errorMessage());
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			$FormError .= ($FormError <> "") ? "<p>&nbsp;</p>" : "";
			$FormError .= $formCustomError;
		}
		return $validateForm;
	}

	// Clear selection stored in session
	protected function clearSessionSelection($parm)
	{
		$_SESSION["sel_r0307_pembayaran_$parm"] = "";
		$_SESSION["rf_r0307_pembayaran_$parm"] = "";
		$_SESSION["rt_r0307_pembayaran_$parm"] = "";
	}

	// Load selection from session
	protected function loadSelectionFromSession($parm)
	{
		foreach ($this->fields as $fld) {
			if ($fld->Param == $parm) {
				$fld->SelectionList = @$_SESSION["sel_r0307_pembayaran_$parm"];
				$fld->RangeFrom = @$_SESSION["rf_r0307_pembayaran_$parm"];
				$fld->RangeTo = @$_SESSION["rt_r0307_pembayaran_$parm"];
				break;
			}
		}
	}

	// Load default value for filters
	protected function loadDefaultFilters()
	{

		/**
		* Set up default values for non Text filters
		*/

		/**
		* Set up default values for extended filters
		* function setDefaultExtFilter(&$fld, $so1, $sv1, $sc, $so2, $sv2)
		* Parameters:
		* $fld - Field object
		* $so1 - Default search operator 1
		* $sv1 - Default ext filter value 1
		* $sc - Default search condition (if operator 2 is enabled)
		* $so2 - Default search operator 2 (if operator 2 is enabled)
		* $sv2 - Default ext filter value 2 (if operator 2 is enabled)
		*/
		// Field TahunAjaran

		$this->setDefaultExtFilter($this->TahunAjaran, "=", NULL, 'AND', "=", NULL);
		if (!$this->SearchCommand)
			$this->applyDefaultExtFilter($this->TahunAjaran);

		// Field Sekolah
		$this->setDefaultExtFilter($this->Sekolah, "=", NULL, 'AND', "=", NULL);
		if (!$this->SearchCommand)
			$this->applyDefaultExtFilter($this->Sekolah);

		// Field Kelas
		$this->setDefaultExtFilter($this->Kelas, "=", NULL, 'AND', "=", NULL);
		if (!$this->SearchCommand)
			$this->applyDefaultExtFilter($this->Kelas);

		// Field NIS
		$this->setDefaultExtFilter($this->NIS, "=", NULL, 'AND', "=", NULL);
		if (!$this->SearchCommand)
			$this->applyDefaultExtFilter($this->NIS);

		// Field Nama
		$this->setDefaultExtFilter($this->Nama, "=", NULL, 'AND', "=", NULL);
		if (!$this->SearchCommand)
			$this->applyDefaultExtFilter($this->Nama);

		// Field Tanggal
		$this->setDefaultExtFilter($this->Tanggal, "BETWEEN", NULL, 'AND', "=", NULL);
		if (!$this->SearchCommand)
			$this->applyDefaultExtFilter($this->Tanggal);

		/**
		* Set up default values for popup filters
		*/
	}

	// Check if filter applied
	protected function checkFilter()
	{

		// Check TahunAjaran text filter
		if ($this->textFilterApplied($this->TahunAjaran))
			return TRUE;

		// Check Sekolah text filter
		if ($this->textFilterApplied($this->Sekolah))
			return TRUE;

		// Check Kelas text filter
		if ($this->textFilterApplied($this->Kelas))
			return TRUE;

		// Check NIS text filter
		if ($this->textFilterApplied($this->NIS))
			return TRUE;

		// Check Nama text filter
		if ($this->textFilterApplied($this->Nama))
			return TRUE;

		// Check Tanggal text filter
		if ($this->textFilterApplied($this->Tanggal))
			return TRUE;
		return FALSE;
	}

	// Show list of filters
	public function showFilterList($showDate = FALSE)
	{
		global $ReportLanguage;

		// Initialize
		$filterList = "";
		$captionClass = $this->isExport("email") ? "ew-filter-caption-email" : "ew-filter-caption";
		$captionSuffix = $this->isExport("email") ? ": " : "";

		// Field TahunAjaran
		$extWrk = "";
		$wrk = "";
		$this->buildExtendedFilter($this->TahunAjaran, $extWrk);
		$filter = "";
		if ($extWrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$extWrk</span>";
		elseif ($wrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$wrk</span>";
		if ($filter <> "")
			$filterList .= "<div><span class=\"" . $captionClass . "\">" . $this->TahunAjaran->caption() . "</span>" . $captionSuffix . $filter . "</div>";

		// Field Sekolah
		$extWrk = "";
		$wrk = "";
		$this->buildExtendedFilter($this->Sekolah, $extWrk);
		$filter = "";
		if ($extWrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$extWrk</span>";
		elseif ($wrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$wrk</span>";
		if ($filter <> "")
			$filterList .= "<div><span class=\"" . $captionClass . "\">" . $this->Sekolah->caption() . "</span>" . $captionSuffix . $filter . "</div>";

		// Field Kelas
		$extWrk = "";
		$wrk = "";
		$this->buildExtendedFilter($this->Kelas, $extWrk);
		$filter = "";
		if ($extWrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$extWrk</span>";
		elseif ($wrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$wrk</span>";
		if ($filter <> "")
			$filterList .= "<div><span class=\"" . $captionClass . "\">" . $this->Kelas->caption() . "</span>" . $captionSuffix . $filter . "</div>";

		// Field NIS
		$extWrk = "";
		$wrk = "";
		$this->buildExtendedFilter($this->NIS, $extWrk);
		$filter = "";
		if ($extWrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$extWrk</span>";
		elseif ($wrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$wrk</span>";
		if ($filter <> "")
			$filterList .= "<div><span class=\"" . $captionClass . "\">" . $this->NIS->caption() . "</span>" . $captionSuffix . $filter . "</div>";

		// Field Nama
		$extWrk = "";
		$wrk = "";
		$this->buildExtendedFilter($this->Nama, $extWrk);
		$filter = "";
		if ($extWrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$extWrk</span>";
		elseif ($wrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$wrk</span>";
		if ($filter <> "")
			$filterList .= "<div><span class=\"" . $captionClass . "\">" . $this->Nama->caption() . "</span>" . $captionSuffix . $filter . "</div>";

		// Field Tanggal
		$extWrk = "";
		$wrk = "";
		$this->buildExtendedFilter($this->Tanggal, $extWrk);
		$filter = "";
		if ($extWrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$extWrk</span>";
		elseif ($wrk <> "")
			$filter .= "<span class=\"ew-filter-value\">$wrk</span>";
		if ($filter <> "")
			$filterList .= "<div><span class=\"" . $captionClass . "\">" . $this->Tanggal->caption() . "</span>" . $captionSuffix . $filter . "</div>";
		$divdataclass = "";

		// Show Filters
		if ($filterList <> "" || $showDate) {
			$message = "<div" . $divdataclass . "><div id=\"ew-filter-list\" class=\"alert alert-info d-table\">";
			if ($showDate)
				$message .= "<div id=\"ew-current-date\">" . $ReportLanguage->phrase("ReportGeneratedDate") . FormatDateTime(date("Y-m-d H:i:s"), 1) . "</div>";
			if ($filterList <> "")
				$message .= "<div id=\"ew-current-filters\">" . $ReportLanguage->phrase("CurrentFilters") . "</div>" . $filterList;
			$message .= "</div></div>";
			$this->Message_Showing($message, "");
			Write($message);
		}
	}

	// Get list of filters
	public function getFilterList()
	{

		// Initialize
		$filterList = "";

		// Field TahunAjaran
		$wrk = "";
		if ($this->TahunAjaran->AdvancedSearch->SearchValue <> "" || $this->TahunAjaran->AdvancedSearch->SearchValue2 <> "") {
			$wrk = "\"x_TahunAjaran\":\"" . JsEncode($this->TahunAjaran->AdvancedSearch->SearchValue) . "\"," .
				"\"z_TahunAjaran\":\"" . JsEncode($this->TahunAjaran->AdvancedSearch->SearchOperator) . "\"," .
				"\"v_TahunAjaran\":\"" . JsEncode($this->TahunAjaran->AdvancedSearch->SearchCondition) . "\"," .
				"\"y_TahunAjaran\":\"" . JsEncode($this->TahunAjaran->AdvancedSearch->SearchValue2) . "\"," .
				"\"w_TahunAjaran\":\"" . JsEncode($this->TahunAjaran->AdvancedSearch->SearchOperator2) . "\"";
		}
		if ($wrk <> "") {
			if ($filterList <> "") $filterList .= ",";
			$filterList .= $wrk;
		}

		// Field Sekolah
		$wrk = "";
		if ($this->Sekolah->AdvancedSearch->SearchValue <> "" || $this->Sekolah->AdvancedSearch->SearchValue2 <> "") {
			$wrk = "\"x_Sekolah\":\"" . JsEncode($this->Sekolah->AdvancedSearch->SearchValue) . "\"," .
				"\"z_Sekolah\":\"" . JsEncode($this->Sekolah->AdvancedSearch->SearchOperator) . "\"," .
				"\"v_Sekolah\":\"" . JsEncode($this->Sekolah->AdvancedSearch->SearchCondition) . "\"," .
				"\"y_Sekolah\":\"" . JsEncode($this->Sekolah->AdvancedSearch->SearchValue2) . "\"," .
				"\"w_Sekolah\":\"" . JsEncode($this->Sekolah->AdvancedSearch->SearchOperator2) . "\"";
		}
		if ($wrk <> "") {
			if ($filterList <> "") $filterList .= ",";
			$filterList .= $wrk;
		}

		// Field Kelas
		$wrk = "";
		if ($this->Kelas->AdvancedSearch->SearchValue <> "" || $this->Kelas->AdvancedSearch->SearchValue2 <> "") {
			$wrk = "\"x_Kelas\":\"" . JsEncode($this->Kelas->AdvancedSearch->SearchValue) . "\"," .
				"\"z_Kelas\":\"" . JsEncode($this->Kelas->AdvancedSearch->SearchOperator) . "\"," .
				"\"v_Kelas\":\"" . JsEncode($this->Kelas->AdvancedSearch->SearchCondition) . "\"," .
				"\"y_Kelas\":\"" . JsEncode($this->Kelas->AdvancedSearch->SearchValue2) . "\"," .
				"\"w_Kelas\":\"" . JsEncode($this->Kelas->AdvancedSearch->SearchOperator2) . "\"";
		}
		if ($wrk <> "") {
			if ($filterList <> "") $filterList .= ",";
			$filterList .= $wrk;
		}

		// Field NIS
		$wrk = "";
		if ($this->NIS->AdvancedSearch->SearchValue <> "" || $this->NIS->AdvancedSearch->SearchValue2 <> "") {
			$wrk = "\"x_NIS\":\"" . JsEncode($this->NIS->AdvancedSearch->SearchValue) . "\"," .
				"\"z_NIS\":\"" . JsEncode($this->NIS->AdvancedSearch->SearchOperator) . "\"," .
				"\"v_NIS\":\"" . JsEncode($this->NIS->AdvancedSearch->SearchCondition) . "\"," .
				"\"y_NIS\":\"" . JsEncode($this->NIS->AdvancedSearch->SearchValue2) . "\"," .
				"\"w_NIS\":\"" . JsEncode($this->NIS->AdvancedSearch->SearchOperator2) . "\"";
		}
		if ($wrk <> "") {
			if ($filterList <> "") $filterList .= ",";
			$filterList .= $wrk;
		}

		// Field Nama
		$wrk = "";
		if ($this->Nama->AdvancedSearch->SearchValue <> "" || $this->Nama->AdvancedSearch->SearchValue2 <> "") {
			$wrk = "\"x_Nama\":\"" . JsEncode($this->Nama->AdvancedSearch->SearchValue) . "\"," .
				"\"z_Nama\":\"" . JsEncode($this->Nama->AdvancedSearch->SearchOperator) . "\"," .
				"\"v_Nama\":\"" . JsEncode($this->Nama->AdvancedSearch->SearchCondition) . "\"," .
				"\"y_Nama\":\"" . JsEncode($this->Nama->AdvancedSearch->SearchValue2) . "\"," .
				"\"w_Nama\":\"" . JsEncode($this->Nama->AdvancedSearch->SearchOperator2) . "\"";
		}
		if ($wrk <> "") {
			if ($filterList <> "") $filterList .= ",";
			$filterList .= $wrk;
		}

		// Field Tanggal
		$wrk = "";
		if ($this->Tanggal->AdvancedSearch->SearchValue <> "" || $this->Tanggal->AdvancedSearch->SearchValue2 <> "") {
			$wrk = "\"x_Tanggal\":\"" . JsEncode($this->Tanggal->AdvancedSearch->SearchValue) . "\"," .
				"\"z_Tanggal\":\"" . JsEncode($this->Tanggal->AdvancedSearch->SearchOperator) . "\"," .
				"\"v_Tanggal\":\"" . JsEncode($this->Tanggal->AdvancedSearch->SearchCondition) . "\"," .
				"\"y_Tanggal\":\"" . JsEncode($this->Tanggal->AdvancedSearch->SearchValue2) . "\"," .
				"\"w_Tanggal\":\"" . JsEncode($this->Tanggal->AdvancedSearch->SearchOperator2) . "\"";
		}
		if ($wrk <> "") {
			if ($filterList <> "") $filterList .= ",";
			$filterList .= $wrk;
		}

		// Return filter list in json
		if ($filterList <> "")
			return "{\"data\":{" . $filterList . "}}";
		else
			return "null";
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd", "") <> "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter", ""), TRUE);
		return $this->setupFilterList($filter);
	}

	// Setup list of filters
	protected function setupFilterList($filter)
	{
		if (!is_array($filter))
			return FALSE;

		// Field TahunAjaran
		$restoreFilter = FALSE;
		if (array_key_exists("x_TahunAjaran", $filter) || array_key_exists("z_TahunAjaran", $filter) ||
			array_key_exists("v_TahunAjaran", $filter) ||
			array_key_exists("y_TahunAjaran", $filter) || array_key_exists("w_TahunAjaran", $filter)) {
			$this->setSessionFilterValues(@$filter["x_TahunAjaran"], @$filter["z_TahunAjaran"], @$filter["v_TahunAjaran"], @$filter["y_TahunAjaran"], @$filter["w_TahunAjaran"], "TahunAjaran");
			$restoreFilter = TRUE;
		}
		if (!$restoreFilter) { // Clear filter
			$this->setSessionFilterValues("", "=", "AND", "", "=", "TahunAjaran");
		}

		// Field Sekolah
		$restoreFilter = FALSE;
		if (array_key_exists("x_Sekolah", $filter) || array_key_exists("z_Sekolah", $filter) ||
			array_key_exists("v_Sekolah", $filter) ||
			array_key_exists("y_Sekolah", $filter) || array_key_exists("w_Sekolah", $filter)) {
			$this->setSessionFilterValues(@$filter["x_Sekolah"], @$filter["z_Sekolah"], @$filter["v_Sekolah"], @$filter["y_Sekolah"], @$filter["w_Sekolah"], "Sekolah");
			$restoreFilter = TRUE;
		}
		if (!$restoreFilter) { // Clear filter
			$this->setSessionFilterValues("", "=", "AND", "", "=", "Sekolah");
		}

		// Field Kelas
		$restoreFilter = FALSE;
		if (array_key_exists("x_Kelas", $filter) || array_key_exists("z_Kelas", $filter) ||
			array_key_exists("v_Kelas", $filter) ||
			array_key_exists("y_Kelas", $filter) || array_key_exists("w_Kelas", $filter)) {
			$this->setSessionFilterValues(@$filter["x_Kelas"], @$filter["z_Kelas"], @$filter["v_Kelas"], @$filter["y_Kelas"], @$filter["w_Kelas"], "Kelas");
			$restoreFilter = TRUE;
		}
		if (!$restoreFilter) { // Clear filter
			$this->setSessionFilterValues("", "=", "AND", "", "=", "Kelas");
		}

		// Field NIS
		$restoreFilter = FALSE;
		if (array_key_exists("x_NIS", $filter) || array_key_exists("z_NIS", $filter) ||
			array_key_exists("v_NIS", $filter) ||
			array_key_exists("y_NIS", $filter) || array_key_exists("w_NIS", $filter)) {
			$this->setSessionFilterValues(@$filter["x_NIS"], @$filter["z_NIS"], @$filter["v_NIS"], @$filter["y_NIS"], @$filter["w_NIS"], "NIS");
			$restoreFilter = TRUE;
		}
		if (!$restoreFilter) { // Clear filter
			$this->setSessionFilterValues("", "=", "AND", "", "=", "NIS");
		}

		// Field Nama
		$restoreFilter = FALSE;
		if (array_key_exists("x_Nama", $filter) || array_key_exists("z_Nama", $filter) ||
			array_key_exists("v_Nama", $filter) ||
			array_key_exists("y_Nama", $filter) || array_key_exists("w_Nama", $filter)) {
			$this->setSessionFilterValues(@$filter["x_Nama"], @$filter["z_Nama"], @$filter["v_Nama"], @$filter["y_Nama"], @$filter["w_Nama"], "Nama");
			$restoreFilter = TRUE;
		}
		if (!$restoreFilter) { // Clear filter
			$this->setSessionFilterValues("", "=", "AND", "", "=", "Nama");
		}

		// Field Tanggal
		$restoreFilter = FALSE;
		if (array_key_exists("x_Tanggal", $filter) || array_key_exists("z_Tanggal", $filter) ||
			array_key_exists("v_Tanggal", $filter) ||
			array_key_exists("y_Tanggal", $filter) || array_key_exists("w_Tanggal", $filter)) {
			$this->setSessionFilterValues(@$filter["x_Tanggal"], @$filter["z_Tanggal"], @$filter["v_Tanggal"], @$filter["y_Tanggal"], @$filter["w_Tanggal"], "Tanggal");
			$restoreFilter = TRUE;
		}
		if (!$restoreFilter) { // Clear filter
			$this->setSessionFilterValues("", "=", "AND", "", "=", "Tanggal");
		}
		return TRUE;
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

					// Render lookup
					$this->RowType == ROWTYPE_VIEW;
					$fn = $fld->Lookup->RenderViewFunc;
					$render = method_exists($this, $fn);

					// Format the field values
					$fld->setDbValue($row[1]);
					if ($render) {
						$this->$fn();
						$row[1] = $fld->ViewValue;
						$row['df'] = $row[1];
					} elseif ($fld->isEncrypt()) {
						$row[1] = $fld->CurrentValue;
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

	// Return popup filter
	protected function getPopupFilter()
	{
		$wrk = "";
		if ($this->DrillDown)
			return "";
		return $wrk;
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
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
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>