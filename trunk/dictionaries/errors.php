<?php

$lang = array(


	'error_header' => array(
		'en' => 'simpleSAMLphp error',
		'no' => 'simpleSAMLphp feil',
		'dk' => 'simpleSAMLphp fejl',
		'fr' => 'erreur de simpleSAMLphp',
		'de' => 'simpleSAMLphp Fehler',
	),
	
	'report_trackid' => array(
		'en' => 'If you report this error, please also report this tracking ID which makes it possible to locate your session in the logs which are available to the system administrator:',
		'no' => 'Hvis du ønsker å rapportere denne feilen, send også med denne sporings-IDen. Den gjør det enklere for systemadministratorene og finne ut hva som gikk galt:',
		'dk' => 'Hvis du vil rapportere denne fejl, så medsend venligst dette sporings-ID. Den gør det muligt for teknikerne at finde fejlen.',
		'es' => 'Por favor, si informa de este error, mantenga el <emph>tracking ID</emph> que permite enonctrar su sesi&oacute;n en los registros de que dispone el administrador del sistema:',
		'fr' => 'Si vous signalez cette erreur, veuillez aussi signaler l\'identifiant de suivi qui permet de trouver votre session dans les logs accessibles à l\'administrateur système :',
		'de' => 'Falls Sie diesen Fehler melden, teilen Sie bitte ebenfalls diese Tracking ID mit, dadurch ist es dem Administrator möglich ihre Sitzung in den Logs zu finden:',
	),
	
	'debuginfo_header' => array(
		'en' => 'Debug information',
		'no' => 'Detaljer for feilsøking',
		'dk' => 'Detaljer til fejlsøgning',
		'es' => 'Informaci&oacute;n de depuraci&oacute;n',
		'fr' => 'Information de débugage',
		'de' => 'Debug Information',
	),

	'debuginfo_text' => array(
		'en' => 'The debug information below may be interesting for the administrator / help desk:',
		'no' => 'Detaljene nedenunder kan være av interesse for administratoren / hjelpetjenesten',
		'dk' => 'Detaljerne herunder kan være af interesse for teknikerne / help-desken',
		'es' => 'La siguiente informaci&oacute; de depuraci;oacute;n puede ser de utilidad para el administrador del sistema o el centro de atenci&aucte;n a usuarios:',
		'fr' => 'L\'information de débugage ci-dessous peut être intéressante pour l\'administrateur ou le help desk',
		'de' => 'Die unten angegebene Debug Information kann von Interesse für den Administrator oder das Help Desk sein:',
	),
	
	'report_header' => array(
		'en' => 'Report errors',
		'no' => 'Rapporter feil',
		'dk' => 'Rapportér fejl',
		'es' => 'Informar del error',
		'fr' => 'Signaler les erreurs',
		'de' => 'Fehler melden',
	),

	'report_text' => array(
		'en' => 'Optionally enter your email address, for the administrators to be able contact you for further questions about your issue:',
		'no' => 'Dersom du ønsker at hjelpetjenesten skal kunde kontakte deg igjen i forbindelse med denne feilen, må du oppgi e-post adressen din nedenunder:',
		'dk' => 'Hvis du vil kunne kontaktes i forbindelse med fejlmeldingen, bedes du indtaste din emailadresse herunder',
		'es' => 'Si lo desea, indique su direcci&oacute;n electr;oacute;nica, para que los administradores puedan ponerse en contacto con usted y obtener datos adicionales de su problema',
		'fr' => 'Facultativement vous pouvez entrer votre courriel, pour que les administrateurs puissent vous contacter par la suite à propose de votre problème :',
		'de' => 'Geben Sie optional eine Emailadresse ein, so dass der Administrator Sie bei etwaigen Rückfragen kontaktieren kann:',
	),
	
	'report_email' => array(
		'en' => 'E-mail address:',
		'no' => 'E-post adresse:',
		'dk' => 'E-mailadresse:',
		'es' => 'Correo-e:',
		'fr' => 'Courriel :',
		'de' => 'Emailadresse:',
	),
	
	'report_explain' => array(
		'en' => 'Explain what you did to get this error...',
		'no' => 'Forklar hva du gjorde og hvordan feilen oppsto...',
		'dk' => 'Forklar hvad du gjorde og hvordan fejlen opstod',
		'es' => 'Explique lo que ha hecho para llegar a este error...',
		'fr' => 'Expliquez ce que vous faisiez pour obtenir cette erreur ...',
		'de' => 'Erläutern Sie wodurch der Fehler auftrat...',
	),
	
	'report_submit' => array(
		'en' => 'Send error report',
		'no' => 'Send feilrapport',
		'dk' => 'Send fejlrapport',
		'es' => 'Send error report',
		'fr' => 'Envoyer le rapport d\'erreur',
		'de' => 'Fehlerbericht absenden',
	),
	
	'howto_header' => array(
		'en' => 'How to get help',
		'no' => 'Hvordan få hjelp',
		'dk' => 'Hvordan få hjælp',
		'fr' => 'Envoyer le rapport d\'erreur',
	),
	
	'howto_text' => array(
		'en' => 'This error probably is due to some unexpected behaviour or to misconfiguration of simpleSAMLphp. Contact the administrator of this login service, and send them the error message above.',
		'no' => 'Denne feilen skyldes sannsynligvis en feilkonfigurasjon av simpleSAMLphp eller som en følge av en uforutsett hendelse. Kontakt administratoren av denne tjenesten og rapporter så mye som mulig angående feilen.',
		'dk' => 'Denne fejl skyldes formentlig en fejlkonfiguration af simpleSAMLphp - alternativt en ukendt fejl. Kontakt administratoren af denne tjeneste og rapportér så mange detaljer som muligt om fejlen',
		'es' => 'Este erro se debe probablemente a un comportamiento inesperado o a una configuraci&oacute; incorrecta de simpleSAMLphp. P&oacute;ngase en contacto con el administrador de este servicio de conexi&oacute;n y env&iacute;ele el mensaje de error anterior.',
		'fr' => 'Cette erreur est problablement causée par un comportement imprévu ou une mauvaise configuration de simpleSAMLphp.  Contactez l\'administrateur de ce service d\'identification et envoyez lui le message d\'erreur.',
		'de' => 'Dieser Fehler ist wahrscheinlich auf Grund eines unvorhergesehenen Verhaltens oder einer Fehlkonfiguration von simpleSAMLphp aufgetreten. Kontaktieren Sie bitte den Administrator dieses Dienstes und schicken ihm die obige Fehlermeldung.',
	),
	
	'title_CACHEAUTHNREQUEST' => array(
		'en' => 'Error making single sign-on to service',
		'es' => 'Error en el inicio de sesi—n œnico',
		'de' => 'Fehler beim Anmelden am Single-Sign-On Dienst',
	),
	'descr_CACHEAUTHNREQUEST' => array(
		'en' => 'You can authenticated and are ready to be sent back to the service that requested authentication, but we could not find your cached authentication request. The request is only cached for a limited amount of time. If you leaved your browser open for hours before entering your username and password, this could be one possible explaination. If this could be the case in your situation, try to go back to the service you want to access, and start a new login process. If this issue continues, please report the problem.',
		'es' => 'Has podido ser autenticado y est‡s listo para retornar al servicio que solicit— la autenticaci—n, pero no es posible encontrar tu solicitud de autenticaci—n en cachŽ. Esta solicitud s—lo se conserva en cachŽ por un periodo limitado de tiempo. Si dej— su navegador abierto durante horas antes de introducir el nombre de usuario y la contrase–a, esto pudo provocar este error. Si es esa la situaci—n, intente retornar al servicio que quer’a acceder e intente acceder de nuevo. Si el problema continœa, por favor informe del problema',
		'de' => 'Sie können authentifiziert werden und sind breit zurück zu dem Dienst geschickt zu werden der die Authentifizierung erfordert hat, allerdings ist die gespeicherte Authentifizierungsanfrage nicht auffindbar. Diese Anfrage wird nur für einen begrenzten Zeitraum gespeichert. Eine mögliche Erklärung wäre, dass Sie ihren Browser für ein paar Stunden offen gelassen haben bevor sie Nutzername und Passwort eingegeben haben. Falls dies der Fall war versuchen Sie bitte erneut auf den Dienst zuzugreifen und starten sie somit einen erneuten Loginprozess. Bitte melden Sie das Problem, falls es weiterhin besteht', 
	),
	
	'title_CREATEREQUEST' => array(
		'en' => 'Error creating request',
		'es' => 'Error en la creaci—n de la solictud',
		'de' => 'Fehler beim Erzeugen der Anfrage',
	),
	'descr_CREATEREQUEST' => array(
		'en' => 'An error occured when trying to create the SAML request.',
		'es' => 'Se ha producido un error al tratar de crear la petici—n SAML.',
		'de' => 'Ein Fehler beim Erzeugen der SAML Anfrage ist aufgetreten',
	),
	
	'title_DISCOPARAMS' => array(
		'en' => 'Bad request to discovery service',
		'es' => 'Solicitud err—nea al servicio de descubrimiento',
		'de' => 'Ungültige Anfrage an den Discovery Service',
	),
	'descr_DISCOPARAMS' => array(
		'en' => 'The parameters sent to the discovery service were not following the specification.',
		'es' => 'Los parametros enviados al servicio de descubrimiento no se ajustan a la especificaci—n
.',
		'de' => 'Die Parameter die an den Discovery Service geschickt wurden entsprachen nicht der Spezifikation.',
	),
	
	'title_GENERATEAUTHNRESPONSE' => array(
		'en' => 'Could not create authentication response',
		'es' => 'No se pudo crear la respuesta de autenticaci—n',
		'de' => 'Konnte keine Authentifikationsantwort erstellen',
	),
	'descr_GENERATEAUTHNRESPONSE' => array(
		'en' => 'When this identity provider tried to create an authentication response, an error occured.',
		'es' => 'El proveedor de identidad ha detectado un error al crear respuesta de autenticaci—n.',
		'de' => 'Beim Versuch des Identity Providers eine Authentifikationsantwort zu erstellen trat ein Fehler auf.',
	),

	'title_GENERATELOGOUTRESPONSE' => array(
		'en' => 'Could not create logout response',
		'es' => 'No se pudo crear la respuesta de cierre de sesi—n',
		'de' => 'Konnte keine Logout Antwort erstellen',
	),
	'descr_GENERATELOGOUTRESPONSE' => array(
		'en' => 'When this SAML entity tried to create an logout response, an error occured.',
		'es' => 'La entidad SAML ha detectado un error al crear la respuesta de cierre de sesi—n.',
		'de' => 'Beim Versuch dieser SAML Entity eine Logout Antwort zu erstellen ist ein Fehler aufgetreten',
	),

	'title_LDAPERROR' => array(
		'en' => 'LDAP Error',
		'es' => 'Error de LDAP',
		'de' => 'LDAP Fehler',
	),
	
	'descr_LDAPERROR' => array(
		'en' => 'LDAP is the user database, and when you try to login, we need to contact an LDAP database. When we tried it this time an error occured.',
		'es' => 'LDAP es la base de datos de usuarios, es necesario contactar con ella cuando usted decide entrar. Se ha producido un error en dicho acceso',
		'de' => 'LDAP ist die Nutzerdatenbank, wenn sie versuchen sich anzumelden muss diese LDAP Datenbank kontaktiert werden, dabei ist dieses mal ein Fehler aufgetreten.',
	),
	
	'title_LOGOUTREQUEST' => array(
		'en' => 'Error processing Logout Request',
		'es' => 'Error al procesar la solicitud de cierre de sesi—n',
		'de' => 'Fehler beim Bearbeiten der Abmeldeanfrage',
	),
	'descr_LOGOUTREQUEST' => array(
		'en' => 'An error occured when trying to process the Logout Request.',
		'es' => 'Se ha producido un error al tratar de procesar la solicitud de cierre de sesi—n.',
		'de' => 'Beim Versuch die Abmeldeanfrage zu bearbeiten ist ein Fehler aufgetreten',
	),
	
	'title_GENERATELOGOUTREQUEST' => array(
		'en' => 'Could not create logout request',
		'es' => 'No se ha podido crear la solicitud de cierre de sesi—n',
		'de' => 'Konnte keine Abmeldeanfrage erstellen',
	),
	'descr_GENERATELOGOUTREQUEST' => array(
		'en' => 'When this SAML entity tried to create an logout request, an error occured.',
		'es' => 'La entidad SAML ha detectado un error al crear la solicitud de cierre de sesi—n.',
		'de' => 'Beim Versuch dieser SAML Entity eine Abmeldeanfrage zu erstellen ist ein Fehler aufgetreten',
	),
	
	'title_LOGOUTRESPONSE' => array(
		'en' => 'Error processing Logout Response',
		'es' => 'Error al procesar la respuesta de cierre de sesi—n',
		'de' => 'Fehler beim Bearbeiten der Abmeldeantwort', 
	),
	'descr_LOGOUTRESPONSE' => array(
		'en' => 'An error occured when trying to process the Logout Response.',
		'es' => 'Se ha producido un error al tratar de procesar la respuesta de cierre de sesi—n.',
		'de' => 'Beim Versuch die Abmeldeantwort zu bearbeiten ist ein Fehler aufgetreten',
	),
	
	'title_METADATA' => array(
		'en' => 'Error loading metadata',
		'es' => 'Error al cargar los metadatos',
		'de' => 'Fehler beim Laden der Metadaten',
	),
	'descr_METADATA' => array(
		'en' => 'There is some misconfiguration of your simpleSAMLphp installation. If you are the administrator of this service, you should make sure your metadata configuration is correctly setup.',
		'es' => 'Hay errores de configuraci—n en su instalaci—n de simpleSAMLphp. Si es usted el administrador del servicio, cerci—rese de que la configuraci—n de los metadatos es correcta.',
		'de' => 'Diese Installation von simpleSAMLphp ist falsch konfiguriert. Falls Sie der Administrator dieses Dienstes sind sollten sie sicherstellen das die Metadatenkonfiguration korrekt ist.',
	),
	
	'title_NOACCESS' => array(
		'en' => 'No access',
		'es' => 'Acceso no definido',
		'de' => 'Kein Zugriff',
	),
	'descr_NOACCESS' => array(
		'en' => 'This endpoint is not enabled. Check the enable options in your configuration of simpleSAMLphp.',
		'es' => 'Este punto de acceso no est‡ habilitado. Verifique las opciones de habilitaci—n en la configuraci—n de simpleSAMLphp.',
		'de' => 'Dieser Endpunkt ist nicht aktiviert. Überprüfen Sie die Aktivierungsoptionen in der simpleSAMLphp Konfiguration.',
	),
	
	'title_NORELAYSTATE' => array(
		'en' => 'No RelayState',
		'es' => 'RelayState no definido',
		'de' => 'Kein Weiterleitungsangabge',
	),
	'descr_NORELAYSTATE' => array(
		'en' => 'The initiator of this request did not provide an RelayState parameter, that tells where to go next.',
		'es' => 'El iniciador de esta solicitud no proporcion— el par‡metro RelayState que indica donde ir a continuaci—n',
		'de' => 'Der Initiator dieser Anfrage hat keinen Weiterleitungsparameter bereit gestellt, der Auskunft gibt wohin es als nächstes gehen soll.',
	),
	
	'title_NOSESSION' => array(
		'en' => 'No session found',
		'es' => 'Sesi—n no encontrada',
		'de' => 'Keine Session gefunden',
	),
	'descr_NOSESSION' => array(
		'en' => 'Unfortuneately we could not get your session. This could be because your browser do not support cookies, or cookies is disabled. Or may be your session timed out because you let the browser open for a long time.',
		'es' => 'Desgraciadamente no hemos podido recuperar su sesi—n. Esto podr’a deberse a que su navegador no soporte cookies o a que las cookies estŽn deshabilitadas.. O quiz‡s su sesi—n caduc— si dej— su navegador abierto durante un periodo importante de tiempo.',
		'de' => 'Die Session konnte nicht gefunden werden. Möglicherweise unterstützt der Browser keine Cookies, oder Cookies sind deaktiviert. Eventuell ist die Session auch ausgelaufen weil der Browser zu lange offen war.',
	),
	
	'title_PROCESSASSERTION' =>	array(
		'en' => 'Error processing response from IdP',
		'es' => 'Error al procesar la respuesta procedente del IdP',
		'de' => 'Fehler beim Bearbeiten der Antwort des IdP',
	),
	'descr_PROCESSASSERTION' =>	array(
		'en' => 'We did not accept the response sent from the Identity Provider.',
		'es' => 'No ha sido posible aceptar la respuesta enviada por el proveedor de identidad.',
		'de' => 'Die Antwort des Identitiy Provider konnte nicht akzeptiert werden.',
	),
	
	'title_PROCESSAUTHNRESPONSE' =>	array(
		'en' => 'Error processing response from Identity Provider',
		'es' => 'Error al procesar la solicitud del proveedor de servicio',
		'de' => 'Fehler beim Bearbeiten der Antwort des Identity Providers',
	),
	'descr_PROCESSAUTHNRESPONSE' =>	array(
		'en' => 'This SP received an authentication response from a identity provider, but an error occured when trying to process the response.',
		'de' => 'Dieser Service Provider hat eine Antwort von einem Identity Provider erhalten, aber beim Bearbeiten dieser Antwort ist ein Fehler aufgetreten.',
	),
	
	'title_PROCESSAUTHNREQUEST' => array(
		'en' => 'Error processing request from Service Provider',
		'no' => 'Feil under prosessering av forespørsel fra SP',
		'es' => 'Error al procesar la solicitud del proveedor de servicio',
		'de' => 'Fehler beim Bearbeiten der Anfrage des Service Providers',
	),
	'descr_PROCESSAUTHNREQUEST' => array(
		'en' => 'This IdP received an authentication request from a service provider, but an error occured when trying to process the request.',
		'no' => 'Denne IdP-en mottok en autentiseringsforespørsel fra en SP, men en feil oppsto under prosessering av requesten.',
		'es' => 'Este IdP ha recibido una petici—n de autenticaci—n de un proveedor de servicio pero se ha producido un error al tratar de procesar la misma.',
		'de' => 'Dieser Identity Provider hat eine Authentifizierungsanfrage von einem Service Provider erhalten, aber es ist ein Fehler beim Bearbeiten dieser Anfrage aufgetreten',
	),
	
	
	'title_SSOSERVICEPARAMS' =>	array(
		'en' => 'Wrong parameters provided',
		'es' => 'Error en los par‡metros recibidos',
		'de' => 'Falsche Parameter bereit gestellt',
	),
	'descr_SSOSERVICEPARAMS' =>	array(
		'en' => 'You must either provide a SAML Request message or a RequestID on this interface.',
		'es' => 'Debe propocionar o una solicitud SAML o un RequestIP para esta interfaz.',
		'de' => 'Sie müssen diesem Interface entweder eine SAML Anfragenachricht oder eine AnfrageID übergeben.',
	),
	
	'title_SLOSERVICEPARAMS' => array(
		'en' => 'No SAML message provided',
		'es' => 'Falta el mensaje SAML',
		'de' => 'Keine SAML Nachricht bereit gestellt',
	),
	'descr_SLOSERVICEPARAMS' => array(
		'en' => 'You accessed the SingleLogoutService interface, but did not provide a SAML LogoutRequest or LogoutResponse.',
		'es' => 'Usted accedi— a la interfaz SingleLogoutService pero no incluy— un mensaje SAML LogoutRequest o LogoutResponse',
		'de' => 'Sie haben auf das SingleLogoutService Interface zugegriffen aber haben keine SAML Abmeldeanfrage oder Abmeldeantwort bereit gestellt.',
	),
	
	'title_ACSPARAMS' => array(
		'en' => 'No SAML response provided',
		'es' => 'Falta la respuesta SAML',
		'de' => 'Keine SAML Antwort bereit gestellt',
	),
	'descr_ACSPARAMS' => array(
		'en' => 'You accessed the Assertion Consumer Service interface, but did not provide a SAML Authentication Response.',
		'es' => 'Usted accedi— a la interfaz consumidora de aserciones pero no incluy— una respuesta de autenticaci—n SAML.',
		'de' => 'Sie haben auf das Assertion Consumer Service Interface zugegriffen aber haben keine SAML Authentifizierungsantwort bereit gestellt.',
	),
	
	'title_CASERROR' => array(
		'en' => 'CAS Error',
		'de' => 'CAS Fehler',
	),
	'descr_CASERROR' => array(
		'en' => 'Error when communicating with the CAS server.',
		'de' => 'Fehler bei der Kommunikation mit dem CAS Server.',
	),

);