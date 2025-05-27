@extends('layouts.app')

@section('title', 'APK Analysis - Nexus Project')

@push('styles')
<style>
    .main-container {
        min-height: 100vh;
        background: linear-gradient(135deg, #0f0f0f 0%, #1a1a1a 50%, #0f0f0f 100%);
        color: white;
        font-family: 'Inter', sans-serif;
        padding: 2rem;
    }

    .hero-section {
        text-align: center;
        padding: 4rem 0;
        background: linear-gradient(135deg, #FCD34D, #F59E0B, #D97706);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 3rem;
    }

    .risk-folder {
        background: rgba(31, 41, 55, 0.8);
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 2rem;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        cursor: pointer;
    }

    .risk-folder:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    .risk-folder.high {
        border-color: #EF4444;
        background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(220, 38, 38, 0.1));
    }

    .risk-folder.high:hover {
        border-color: #F87171;
        box-shadow: 0 20px 40px rgba(239, 68, 68, 0.2);
    }

    .risk-folder.medium {
        border-color: #F59E0B;
        background: linear-gradient(135deg, rgba(245, 158, 11, 0.1), rgba(217, 119, 6, 0.1));
    }

    .risk-folder.medium:hover {
        border-color: #FCD34D;
        box-shadow: 0 20px 40px rgba(245, 158, 11, 0.2);
    }

    .risk-folder.low {
        border-color: #10B981;
        background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(5, 150, 105, 0.1));
    }

    .risk-folder.low:hover {
        border-color: #34D399;
        box-shadow: 0 20px 40px rgba(16, 185, 129, 0.2);
    }

    .folder-header {
        display: flex;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .folder-icon {
        width: 4rem;
        height: 4rem;
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1.5rem;
        font-size: 1.5rem;
    }

    .folder-content {
        display: none;
        margin-top: 1.5rem;
    }

    .folder-content.active {
        display: block;
        animation: fadeInDown 0.3s ease;
    }

    .apk-file {
        background: rgba(17, 24, 39, 0.8);
        border: 1px solid rgba(75, 85, 99, 0.5);
        border-radius: 0.75rem;
        padding: 1.5rem;
        margin-bottom: 1rem;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .apk-file:hover {
        border-color: rgba(156, 163, 175, 0.8);
        transform: translateX(10px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .apk-header {
        display: flex;
        align-items: center;
        justify-content: between;
        margin-bottom: 1rem;
    }

    .apk-icon {
        width: 3rem;
        height: 3rem;
        background: linear-gradient(135deg, #3B82F6, #1E40AF);
        border-radius: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        color: white;
    }

    .security-score {
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        font-weight: 600;
        font-size: 0.875rem;
    }

    .score-high {
        background: rgba(239, 68, 68, 0.2);
        color: #FCA5A5;
        border: 1px solid #EF4444;
    }

    .apk-details {
        display: none;
        margin-top: 1.5rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(75, 85, 99, 0.3);
    }

    .apk-details.active {
        display: block;
        animation: slideDown 0.3s ease;
    }

    .detail-section {
        margin-bottom: 2rem;
    }

    .detail-title {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: #FCD34D;
        border-bottom: 2px solid #F59E0B;
        padding-bottom: 0.5rem;
    }

    .vulnerability-item {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 0.5rem;
        padding: 1rem;
        margin-bottom: 0.75rem;
    }

    .vulnerability-title {
        font-weight: 600;
        color: #FCA5A5;
        margin-bottom: 0.5rem;
    }

    .vulnerability-list {
        list-style: none;
        padding-left: 0;
    }

    .vulnerability-list li {
        padding: 0.25rem 0;
        color: #D1D5DB;
        position: relative;
        padding-left: 1.5rem;
    }

    .vulnerability-list li:before {
        content: "•";
        color: #EF4444;
        font-weight: bold;
        position: absolute;
        left: 0;
    }

    .back-button {
        background: linear-gradient(135deg, #F59E0B, #D97706);
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 0.75rem;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }

    .back-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(245, 158, 11, 0.3);
        color: white;
        text-decoration: none;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            max-height: 0;
        }
        to {
            opacity: 1;
            max-height: 1000px;
        }
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .info-item {
        background: rgba(55, 65, 81, 0.5);
        padding: 1rem;
        border-radius: 0.5rem;
        border: 1px solid rgba(75, 85, 99, 0.3);
    }

    .info-label {
        font-size: 0.875rem;
        color: #9CA3AF;
        margin-bottom: 0.25rem;
    }

    .info-value {
        font-weight: 600;
        color: white;
    }
</style>
@endpush

@section('content')
<div class="main-container">
    <!-- Back Button -->
    <a href="{{ route('nexus.second-semester-phase2') }}" class="back-button">
        <i class="fas fa-arrow-left mr-2"></i>
        Back to Phase 2
    </a>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1 class="text-5xl md:text-6xl font-bold mb-6">APK Security Analysis</h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">
            Comprehensive security assessment of Android applications categorized by risk levels
        </p>
    </section>

    <!-- Risk Level Folders -->
    <div class="max-w-6xl mx-auto">
        <!-- High Risk Folder -->
        <div class="risk-folder high" onclick="toggleFolder('high')">
            <div class="folder-header">
                <div class="folder-icon" style="background: linear-gradient(135deg, #EF4444, #DC2626);">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="flex-1">
                    <h2 class="text-3xl font-bold text-red-400 mb-2">High Risk Applications</h2>
                    <p class="text-red-200 mb-2">Critical security vulnerabilities requiring immediate attention</p>
                    <div class="flex items-center space-x-4 text-sm">
                        <span class="bg-red-600/20 text-red-300 px-3 py-1 rounded-full border border-red-500/40">
                            <i class="fas fa-file-alt mr-1"></i>6 Analysis Reports
                        </span>
                        <span class="bg-red-600/20 text-red-300 px-3 py-1 rounded-full border border-red-500/40">
                            <i class="fas fa-shield-alt mr-1"></i>Score Range: 31-37/100
                        </span>
                    </div>
                </div>
                <div class="text-red-400 text-2xl">
                    <i class="fas fa-chevron-down transition-transform duration-300" id="high-chevron"></i>
                </div>
            </div>
            
            <div class="folder-content" id="high-content">
                <!-- Gmail2 APK -->
                <div class="apk-file" onclick="toggleAPKDetails('gmail2')">
                    <div class="apk-header">
                        <div class="apk-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white">Gmail2</h3>
                            <p class="text-gray-400 text-sm">com.google.android.gm</p>
                        </div>
                        <div class="security-score score-high">
                            Security Score: 36/100
                        </div>
                    </div>
                    
                    <div class="apk-details" id="gmail2-details">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">App Name</div>
                                <div class="info-value">Gmail</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Package</div>
                                <div class="info-value">com.google.android.gm</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">APK Size</div>
                                <div class="info-value">22.33MB</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">SDK Target</div>
                                <div class="info-value">28</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Signed by</div>
                                <div class="info-value">Google Inc. (US)</div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Critical Findings</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">StrandHogg 2.0 Vulnerabilities</div>
                                <p class="text-gray-300 mb-2">Multiple activities are vulnerable to StrandHogg 2.0 (task hijacking), which can be exploited by malicious apps to overlay fake screens and steal sensitive data like credentials.</p>
                                <ul class="vulnerability-list">
                                    <li>AccountSetupFinalGmail, ComposeActivityGmailExternal, MailActivityGmail</li>
                                    <li>MailboxSelectionActivityGmail, PublicGmailActivity, CreateShortcutActivityGmail</li>
                                    <li>These issues allow phishing attacks through malicious overlays</li>
                                    <li>Should be mitigated by updating the launchMode and target SDK to 29+</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Exported Components Without Protection</div>
                                <p class="text-gray-300 mb-2">Numerous Activities, Services, BroadcastReceivers, and Providers are exported and accessible to other apps without adequate permission restrictions.</p>
                                <ul class="vulnerability-list">
                                    <li>GmailActivity, EmlViewerActivityGmail, GmailReceiver, etc.</li>
                                    <li>Many exported components are only protected by "dangerous" level permissions</li>
                                    <li>Some components not protected at all</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Permissions Risk</div>
                                <p class="text-gray-300 mb-2">The app requests many sensitive and high-impact permissions:</p>
                                <ul class="vulnerability-list">
                                    <li>AUTHENTICATE_ACCOUNTS, MANAGE_ACCOUNTS, USE_CREDENTIALS</li>
                                    <li>READ_CONTACTS, WRITE_CONTACTS, READ_CALENDAR, WRITE_CALENDAR</li>
                                    <li>GET_ACCOUNTS, READ_PROFILE, WRITE_EXTERNAL_STORAGE</li>
                                    <li>Includes unknown or undocumented permissions, increasing potential for abuse</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Code & Storage Issues</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Sensitive Data Exposure</div>
                                <ul class="vulnerability-list">
                                    <li>Sensitive info logged (CWE-532)</li>
                                    <li>World-readable/writable SharedPreferences</li>
                                    <li>Temp file usage and clipboard access may leak private content</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Insecure Cryptography</div>
                                <ul class="vulnerability-list">
                                    <li>Uses MD5 and SHA-1 (both deprecated)</li>
                                    <li>Uses CBC mode encryption with padding — vulnerable to padding oracle attacks (CWE-649)</li>
                                    <li>Uses non-secure random number generator (java.util.Random) (CWE-330)</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">SQL Injection Risk</div>
                                <ul class="vulnerability-list">
                                    <li>Executes raw SQL queries with potential for unsanitized inputs (CWE-89)</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Insecure WebView Usage</div>
                                <ul class="vulnerability-list">
                                    <li>WebView implementation lacks safeguards</li>
                                    <li>May allow execution of untrusted JavaScript or code injection (CWE-749)</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Binary Analysis</h4>
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Obfuscation & Anti-Reversing</div>
                                <ul class="vulnerability-list">
                                    <li>Contains anti-debugging, anti-VM, and illegal class names</li>
                                    <li>ProGuard/R8 code shrinking and obfuscation detected</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Potential Malware Indicators</h4>
                            <div class="bg-yellow-900/20 border border-yellow-500/30 rounded-lg p-4">
                                <p class="text-yellow-200">
                                    There is no direct malware signature, but due to critical vulnerabilities (StrandHogg 2.0), excessive permissions, insecure component exposure, weak cryptography, and potential for code injection or SQLi, the app is highly exploitable and could be abused as a vector by malware or privilege escalation techniques.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- GmsCore APK -->
                <div class="apk-file" onclick="toggleAPKDetails('gmscore')">
                    <div class="apk-header">
                        <div class="apk-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white">GmsCore</h3>
                            <p class="text-gray-400 text-sm">com.google.android.gms</p>
                        </div>
                        <div class="security-score score-high">
                            Security Score: 35/100
                        </div>
                    </div>
                    
                    <div class="apk-details" id="gmscore-details">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">App Name</div>
                                <div class="info-value">GmsCore (Google Play Services)</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Package</div>
                                <div class="info-value">com.google.android.gms</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">APK Size</div>
                                <div class="info-value">52.81 MB</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">SDK Target</div>
                                <div class="info-value">28</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Signed by</div>
                                <div class="info-value">Google Inc. (US)</div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Critical Findings</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">StrandHogg 2.0 Vulnerabilities</div>
                                <p class="text-gray-300 mb-2">Multiple activities are vulnerable to the StrandHogg 2.0 task hijacking exploit, which can allow malicious apps to overlay fake screens and steal sensitive data.</p>
                                <ul class="vulnerability-list">
                                    <li>SettingsLoaderActivity</li>
                                    <li>AdsSettingsActivity</li>
                                    <li>AppInviteActivity</li>
                                    <li>AppInviteAcceptInvitationActivity</li>
                                    <li>SignInActivity</li>
                                    <li>Mitigation: Update launchMode to singleInstance and set taskAffinity to empty string</li>
                                    <li>Update target SDK version to 29 or higher</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Exported Components Without Adequate Protection</div>
                                <p class="text-gray-300 mb-2">Many Activities, Services, and Broadcast Receivers are exported and accessible to other apps without adequate protection.</p>
                                <ul class="vulnerability-list">
                                    <li>AnalyticsReceiver</li>
                                    <li>AppInviteService</li>
                                    <li>AdvertisingIdService</li>
                                    <li>GservicesValueBrokerService</li>
                                    <li>These components could be abused by other apps to inject code or exploit privileges</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Permissions Risk</div>
                                <p class="text-gray-300 mb-2">The app requests a huge list of dangerous and sensitive permissions:</p>
                                <ul class="vulnerability-list">
                                    <li>AUTHENTICATE_ACCOUNTS, MANAGE_ACCOUNTS, USE_CREDENTIALS</li>
                                    <li>ACCESS_FINE_LOCATION, READ_CONTACTS, WRITE_CONTACTS</li>
                                    <li>READ_PHONE_STATE, CAMERA, RECORD_AUDIO</li>
                                    <li>SEND_SMS, PROCESS_OUTGOING_CALLS</li>
                                    <li>Large number of unknown permissions suggesting undocumented features</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Insecure Network Config</div>
                                <ul class="vulnerability-list">
                                    <li>Cleartext traffic allowed — insecure configuration allows unencrypted data transfer</li>
                                    <li>Exposes sensitive data to interception</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Certificate Vulnerabilities</div>
                                <ul class="vulnerability-list">
                                    <li>Janus vulnerability — signed only with v1 signature scheme</li>
                                    <li>Exploitable on Android 5.0–8.0</li>
                                    <li>MD5 signature algorithm — known to be insecure</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Anti-VM & Anti-Debugging Code</div>
                                <ul class="vulnerability-list">
                                    <li>Multiple DEX files contain anti-VM, anti-debug, and suspicious code</li>
                                    <li>Potentially to evade analysis or hide malicious behavior</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Potential Malware Indicators</h4>
                            <div class="bg-yellow-900/20 border border-yellow-500/30 rounded-lg p-4">
                                <p class="text-yellow-200">
                                    No direct malware signatures were detected. However, due to multiple critical vulnerabilities, excessive and sensitive permissions, insecure component exposure, and anti-debugging/anti-VM code, the app has a high risk of exploitation by malware or for privilege escalation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Photos APK -->
                <div class="apk-file" onclick="toggleAPKDetails('photos')">
                    <div class="apk-header">
                        <div class="apk-icon">
                            <i class="fas fa-images"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white">Photos</h3>
                            <p class="text-gray-400 text-sm">com.google.android.apps.photos</p>
                        </div>
                        <div class="security-score score-high">
                            Security Score: 36/100
                        </div>
                    </div>
                    
                    <div class="apk-details" id="photos-details">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">App Name</div>
                                <div class="info-value">Photos</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Package</div>
                                <div class="info-value">com.google.android.apps.photos</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">APK Size</div>
                                <div class="info-value">51.09 MB</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">SDK Target</div>
                                <div class="info-value">28</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Signed by</div>
                                <div class="info-value">Google Inc. (US)</div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Critical Findings</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">StrandHogg 2.0 Vulnerabilities</div>
                                <p class="text-gray-300 mb-2">Several activities are vulnerable to the StrandHogg 2.0 exploit, making them susceptible to phishing attacks via malicious overlays.</p>
                                <ul class="vulnerability-list">
                                    <li>LiveAlbumCreationActivityAlias</li>
                                    <li>BackupOptionsActivity</li>
                                    <li>ConceptMovieDeepLinkActivity</li>
                                    <li>ConceptMovieDeepLinkActivityAlias</li>
                                    <li>Mitigation: Update launchMode to singleInstance and set taskAffinity to empty string</li>
                                    <li>Update target SDK to 29+</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Exported Components Without Adequate Protection</div>
                                <p class="text-gray-300 mb-2">Many Activities, Services, and Broadcast Receivers are exported and accessible without proper protection.</p>
                                <ul class="vulnerability-list">
                                    <li>CameraAssistantService</li>
                                    <li>PhotosBackupApiService</li>
                                    <li>PixelOfferReceiver</li>
                                    <li>CameraShortcutBroadcastReceiver</li>
                                    <li>Can let malicious apps exploit these components to gain access to app data or privileges</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Permissions Risk</div>
                                <p class="text-gray-300 mb-2">The app requests numerous sensitive permissions:</p>
                                <ul class="vulnerability-list">
                                    <li>ACCESS_FINE_LOCATION, ACCESS_COARSE_LOCATION</li>
                                    <li>READ_CONTACTS, WRITE_CONTACTS, READ_PROFILE</li>
                                    <li>READ_PHONE_STATE, MANAGE_ACCOUNTS, USE_CREDENTIALS</li>
                                    <li>CAMERA, WRITE_EXTERNAL_STORAGE</li>
                                    <li>SYSTEM_ALERT_WINDOW, WRITE_SETTINGS</li>
                                    <li>Presence of unknown permissions — adds risk of misuse or hidden features</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Insecure Network Config</div>
                                <ul class="vulnerability-list">
                                    <li>Cleartext traffic enabled — the app allows transmission of data in plaintext</li>
                                    <li>Exposing data to eavesdropping or modification</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Certificate Vulnerabilities</div>
                                <ul class="vulnerability-list">
                                    <li>Janus vulnerability — uses only v1 signature scheme</li>
                                    <li>MD5 signature algorithm — known to be insecure</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Anti-VM & Anti-Debugging Code</div>
                                <ul class="vulnerability-list">
                                    <li>Found in classes.dex and others</li>
                                    <li>Could be used to detect analysis environments and hide behavior</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Potential Malware Indicators</h4>
                            <div class="bg-yellow-900/20 border border-yellow-500/30 rounded-lg p-4">
                                <p class="text-yellow-200">
                                    No explicit malware detected. However, due to critical vulnerabilities (StrandHogg 2.0), excessive permissions and exposure, insecure networking (cleartext), and anti-debugging/anti-VM code, the app could potentially be exploited by malware or for privilege escalation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Velvet APK -->
                <div class="apk-file" onclick="toggleAPKDetails('velvet')">
                    <div class="apk-header">
                        <div class="apk-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white">Velvet</h3>
                            <p class="text-gray-400 text-sm">com.google.android.googlequicksearchbox</p>
                        </div>
                        <div class="security-score score-high">
                            Security Score: 31/100
                        </div>
                    </div>
                    
                    <div class="apk-details" id="velvet-details">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">App Name</div>
                                <div class="info-value">Velvet</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Package</div>
                                <div class="info-value">com.google.android.googlequicksearchbox</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">APK Size</div>
                                <div class="info-value">86.65MB</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">SDK Target</div>
                                <div class="info-value">26</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Signed by</div>
                                <div class="info-value">Google Inc. (US)</div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Critical Findings</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">StrandHogg 2.0 Vulnerabilities</div>
                                <p class="text-gray-300 mb-2">Numerous Activities are vulnerable to StrandHogg 2.0 task hijacking, which allows malicious apps to display fake UI screens to phish credentials or mislead users.</p>
                                <ul class="vulnerability-list">
                                    <li>BrowserReturnActivity</li>
                                    <li>AssistantHandoffActivity</li>
                                    <li>AgentDirectoryActivity</li>
                                    <li>GEL Launcher</li>
                                    <li>Search and Voice-related Activities</li>
                                    <li>WallpaperCropActivity</li>
                                    <li>OpaAutoOptInActivity</li>
                                    <li>QueryEntryActivity</li>
                                    <li>AppIndexingActivity</li>
                                    <li>VoiceSearchActivity</li>
                                    <li>These activities are not protected and are exported without proper permission constraints</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Exported Components Without Protection</div>
                                <p class="text-gray-300 mb-2">Multiple exported Activities, Services, and BroadcastReceivers are accessible to other apps without being adequately secured. Many use android:exported=true and lack permission-based access control.</p>
                                <ul class="vulnerability-list">
                                    <li>BlobDownloadedReceiver</li>
                                    <li>EventLoggerService</li>
                                    <li>PublicSearchService</li>
                                    <li>ReflectionReceiver</li>
                                    <li>RemindersListenerService</li>
                                    <li>HotwordService</li>
                                    <li>Some components are protected by weak or undefined permissions</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Permissions Risk</div>
                                <p class="text-gray-300 mb-2">Velvet requests an extensive list of dangerous and sensitive permissions:</p>
                                <ul class="vulnerability-list">
                                    <li>READ_CONTACTS, WRITE_CONTACTS, READ_SMS, SEND_SMS</li>
                                    <li>CALL_PHONE, READ_PHONE_STATE, RECORD_AUDIO, CAMERA</li>
                                    <li>ACCESS_FINE_LOCATION, MANAGE_ACCOUNTS, USE_CREDENTIALS</li>
                                    <li>READ_CALENDAR, WRITE_CALENDAR, WRITE_EXTERNAL_STORAGE</li>
                                    <li>Many unknown/undocumented permissions with unclear behavior</li>
                                    <li>These permissions collectively give the app deep access to personal user data, device state, communications, and more</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Insecure Network and Signing Configuration</div>
                                <ul class="vulnerability-list">
                                    <li>Network security config allows cleartext traffic</li>
                                    <li>Signed only with v1 signature, making it vulnerable to Janus vulnerability on Android 5.0–8.0</li>
                                    <li>Uses MD5 hashing for certificate, which is cryptographically broken</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Anti-Reversing and Obfuscation</div>
                                <ul class="vulnerability-list">
                                    <li>Anti-VM checks (fingerprint, SIM operator, hardware) are present</li>
                                    <li>Uses R8 compiler without proper markers</li>
                                    <li>Could be actively resisting analysis or hiding behavior</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Videos APK -->
                <div class="apk-file" onclick="toggleAPKDetails('videos')">
                    <div class="apk-header">
                        <div class="apk-icon">
                            <i class="fas fa-video"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white">Videos</h3>
                            <p class="text-gray-400 text-sm">com.google.android.videos</p>
                        </div>
                        <div class="security-score score-high">
                            Security Score: 37/100
                        </div>
                    </div>
                    
                    <div class="apk-details" id="videos-details">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">App Name</div>
                                <div class="info-value">Videos (Google Play Movies)</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Package</div>
                                <div class="info-value">com.google.android.videos</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">APK Size</div>
                                <div class="info-value">22.88MB</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">SDK Target</div>
                                <div class="info-value">26</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Signed by</div>
                                <div class="info-value">Google Inc. (US)</div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Critical Findings</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">StrandHogg 2.0 Vulnerabilities</div>
                                <p class="text-gray-300 mb-2">Many activities in this APK are vulnerable to StrandHogg 2.0 and classic task hijacking, creating major phishing risk vectors.</p>
                                <ul class="vulnerability-list">
                                    <li>VideosActivity (multiple variants: tablet, froyo, honeycomb)</li>
                                    <li>LauncherActivity, EntryPoint, HomeLauncherActivity</li>
                                    <li>SearchActivity, SettingsActivity, LogCollectorActivity</li>
                                    <li>DevicePairingActivity, RootActivity</li>
                                    <li>Most are exposed (exported=true) and lack sufficient protection mechanisms</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Exported Components Without Protection</div>
                                <p class="text-gray-300 mb-2">Numerous components (Activities, Receivers) are exported without adequate restrictions. These could be used by malware to interact with the app in unintended ways.</p>
                                <ul class="vulnerability-list">
                                    <li>RestrictionsActivity$Receiver</li>
                                    <li>LogCollectorActivity</li>
                                    <li>LauncherActivity and aliases</li>
                                    <li>All these expose internal app functionality to third-party apps</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Permissions Risk</div>
                                <p class="text-gray-300 mb-2">This app requests many dangerous permissions:</p>
                                <ul class="vulnerability-list">
                                    <li>READ_PHONE_STATE</li>
                                    <li>GET_ACCOUNTS, USE_CREDENTIALS</li>
                                    <li>READ_EXTERNAL_STORAGE, WRITE_EXTERNAL_STORAGE</li>
                                    <li>ACCESS_COARSE_LOCATION</li>
                                    <li>Several unknown or undocumented permissions also raise red flags:</li>
                                    <li>com.google.android.providers.gsf.permission.READ_GSERVICES</li>
                                    <li>com.google.android.googleapps.permission.GOOGLE_AUTH</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Insecure Signature and Cryptography</div>
                                <ul class="vulnerability-list">
                                    <li>Signed only with v1 signature, exposing the app to Janus attacks</li>
                                    <li>Signed using MD5 hash, which is deprecated due to collision vulnerabilities</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Obfuscation and Anti-Analysis</div>
                                <ul class="vulnerability-list">
                                    <li>Uses Arxan obfuscator in native libs (libwvmediadrm.so)</li>
                                    <li>Anti-VM checks in classes.dex and classes2.dex</li>
                                    <li>R8 used without identifying markers, suggesting attempts to resist static analysis</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- YouTube APK -->
                <div class="apk-file" onclick="toggleAPKDetails('youtube')">
                    <div class="apk-header">
                        <div class="apk-icon">
                            <i class="fab fa-youtube"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-white">YouTube</h3>
                            <p class="text-gray-400 text-sm">com.google.android.youtube</p>
                        </div>
                        <div class="security-score score-high">
                            Security Score: 34/100
                        </div>
                    </div>
                    
                    <div class="apk-details" id="youtube-details">
                        <div class="info-grid">
                            <div class="info-item">
                                <div class="info-label">App Name</div>
                                <div class="info-value">YouTube</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Package</div>
                                <div class="info-value">com.google.android.youtube</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">APK Size</div>
                                <div class="info-value">51.49MB</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">SDK Target</div>
                                <div class="info-value">28</div>
                            </div>
                            <div class="info-item">
                                <div class="info-label">Signed by</div>
                                <div class="info-value">Google Inc. (US)</div>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Critical Findings</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">StrandHogg 2.0 Vulnerabilities</div>
                                <p class="text-gray-300 mb-2">A total of 18 activities in the app are vulnerable to the StrandHogg 2.0 task hijacking vulnerability. This exposes the app to potential phishing attacks by allowing malicious apps to overlay fake UI screens.</p>
                                <ul class="vulnerability-list">
                                    <li>Shell$HomeActivity</li>
                                    <li>HomeActivity</li>
                                    <li>Shell$UploadActivity</li>
                                    <li>UploadIntentHandlingActivity</li>
                                    <li>UrlActivity</li>
                                    <li>MediaSearchActivity</li>
                                    <li>SettingsActivity</li>
                                    <li>ManageNetworkUsageActivity</li>
                                    <li>LiveCreationActivity</li>
                                    <li>StandalonePlayerActivity</li>
                                    <li>LogCollectorActivity</li>
                                    <li>LicenseMenuActivity</li>
                                    <li>Each of these activities lacks proper protection (android:exported=true without permission restriction)</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Exported Components Without Protection</div>
                                <p class="text-gray-300 mb-2">Numerous services and broadcast receivers are exported and accessible to any other app on the device:</p>
                                <ul class="vulnerability-list">
                                    <li>FcmMessageListenerService</li>
                                    <li>GcmBroadcastReceiver</li>
                                    <li>AccountsChangedReceiver</li>
                                    <li>YouTubeService</li>
                                    <li>FirebaseInstanceIdService</li>
                                    <li>FirebaseMessagingService</li>
                                    <li>PackageReplacedReceiver</li>
                                    <li>These components are either not protected or rely on permissions that are weak, undefined, or not present</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Permissions Risk</div>
                                <p class="text-gray-300 mb-2">YouTube requests a significant number of dangerous permissions. Some of the most sensitive include:</p>
                                <ul class="vulnerability-list">
                                    <li>RECORD_AUDIO, CAMERA: Full media access</li>
                                    <li>READ_CONTACTS, ACCESS_FINE_LOCATION, READ_PHONE_STATE: Access to private user data</li>
                                    <li>SEND_SMS, RECEIVE_SMS: Communication interception or misuse</li>
                                    <li>WRITE_EXTERNAL_STORAGE: Can store sensitive files in shared areas</li>
                                    <li>USE_CREDENTIALS, MANAGE_ACCOUNTS: Potential abuse of authentication systems</li>
                                    <li>Together, these permissions enable wide access to device and user data</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Code and Certificate Issues</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Certificate and Cryptographic Issues</div>
                                <ul class="vulnerability-list">
                                    <li>Vulnerable to Janus: App uses only the v1 signature scheme, exposing it to the Janus vulnerability (Android 5.0–8.0)</li>
                                    <li>Weak Certificate Hashing: Certificate signed using MD5, which is cryptographically broken and susceptible to collision attacks</li>
                                    <li>Uses SHA-1 in some areas, which is also considered deprecated and insecure</li>
                                </ul>
                            </div>

                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Anti-Analysis Features</div>
                                <ul class="vulnerability-list">
                                    <li>Anti-VM, Anti-Debug, and Anti-Disassembly techniques (e.g., Build.MANUFACTURER, Build.FINGERPRINT, illegal class names)</li>
                                    <li>R8 compiler used, code is heavily obfuscated making manual inspection difficult</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Storage and Data Risks</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Data Security Issues</div>
                                <ul class="vulnerability-list">
                                    <li>Insecure Random Number Generator: Uses weak RNGs which may affect cryptographic operations</li>
                                    <li>Sensitive Data in Logs: Potential leakage of data via logs (CWE-532)</li>
                                    <li>Improper Use of SQLite: Raw SQL queries used without sanitization—risk of SQL Injection</li>
                                    <li>Data copied to clipboard: Can be accessed by other apps—potential leak vector</li>
                                    <li>World Writable Files: Some files are writable by any app—risk of tampering</li>
                                    <li>External Storage Access: Sensitive data stored on shared external storage—no access control</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Network and WebView Security</h4>
                            
                            <div class="vulnerability-item">
                                <div class="vulnerability-title">Network Security Issues</div>
                                <ul class="vulnerability-list">
                                    <li>Allows Cleartext Traffic: Base configuration permits non-encrypted communication</li>
                                    <li>Insecure WebView: App uses WebView with user-controlled code—risk of remote code execution</li>
                                </ul>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Binary Analysis</h4>
                            <div class="bg-blue-900/20 border border-blue-500/30 rounded-lg p-4">
                                <p class="text-blue-200">
                                    Most shared object binaries are built with NX, stack canary, and PIE flags, which help mitigate exploits. However, Partial RELRO is common across all binaries, reducing resistance against GOT overwrite attacks.
                                </p>
                            </div>
                        </div>

                        <div class="detail-section">
                            <h4 class="detail-title">Malware Indicators</h4>
                            <div class="bg-yellow-900/20 border border-yellow-500/30 rounded-lg p-4">
                                <p class="text-yellow-200">
                                    While no hard malware signatures were flagged, the presence of anti-reversing checks, aggressive obfuscation, exported activities, insecure permissions and data handling could indicate either potential for abuse, or efforts to hide suspicious behavior. These are consistent with common traits in repackaged or modified APKs.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Medium Risk Folder -->
        <div class="risk-folder medium" onclick="toggleFolder('medium')">
            <div class="folder-header">
                <div class="folder-icon" style="background: linear-gradient(135deg, #F59E0B, #D97706);">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="flex-1">
                    <h2 class="text-3xl font-bold text-orange-400 mb-2">Medium Risk Applications</h2>
                    <p class="text-orange-200 mb-2">Moderate security concerns requiring attention</p>
                    <div class="flex items-center space-x-4 text-sm">
                        <span class="bg-orange-600/20 text-orange-300 px-3 py-1 rounded-full border border-orange-500/40">
                            <i class="fas fa-file-alt mr-1"></i>Coming Soon
                        </span>
                        <span class="bg-orange-600/20 text-orange-300 px-3 py-1 rounded-full border border-orange-500/40">
                            <i class="fas fa-shield-alt mr-1"></i>Score Range: 40-70/100
                        </span>
                    </div>
                </div>
                <div class="text-orange-400 text-2xl">
                    <i class="fas fa-chevron-down transition-transform duration-300" id="medium-chevron"></i>
                </div>
            </div>
            
            <div class="folder-content" id="medium-content">
                <div class="bg-orange-900/20 border border-orange-500/30 rounded-lg p-8 text-center">
                    <i class="fas fa-clock text-orange-400 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold text-orange-300 mb-2">Medium Risk Analysis In Progress</h3>
                    <p class="text-orange-200">
                        Medium risk APK analysis reports are currently being prepared and will be available in the next update.
                    </p>
                </div>
            </div>
        </div>

        <!-- Low Risk Folder -->
        <div class="risk-folder low" onclick="toggleFolder('low')">
            <div class="folder-header">
                <div class="folder-icon" style="background: linear-gradient(135deg, #10B981, #059669);">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="flex-1">
                    <h2 class="text-3xl font-bold text-green-400 mb-2">Low Risk Applications</h2>
                    <p class="text-green-200 mb-2">Minimal security concerns with good practices</p>
                    <div class="flex items-center space-x-4 text-sm">
                        <span class="bg-green-600/20 text-green-300 px-3 py-1 rounded-full border border-green-500/40">
                            <i class="fas fa-file-alt mr-1"></i>Coming Soon
                        </span>
                        <span class="bg-green-600/20 text-green-300 px-3 py-1 rounded-full border border-green-500/40">
                            <i class="fas fa-shield-alt mr-1"></i>Score Range: 70-100/100
                        </span>
                    </div>
                </div>
                <div class="text-green-400 text-2xl">
                    <i class="fas fa-chevron-down transition-transform duration-300" id="low-chevron"></i>
                </div>
            </div>
            
            <div class="folder-content" id="low-content">
                <div class="bg-green-900/20 border border-green-500/30 rounded-lg p-8 text-center">
                    <i class="fas fa-clock text-green-400 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold text-green-300 mb-2">Low Risk Analysis In Progress</h3>
                    <p class="text-green-200">
                        Low risk APK analysis reports are currently being prepared and will be available in the next update.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all folders as closed
    const folders = ['high', 'medium', 'low'];
    folders.forEach(folder => {
        const content = document.getElementById(`${folder}-content`);
        const chevron = document.getElementById(`${folder}-chevron`);
        if (content) content.classList.remove('active');
        if (chevron) chevron.style.transform = 'rotate(0deg)';
    });
});

function toggleFolder(folderId) {
    const content = document.getElementById(`${folderId}-content`);
    const chevron = document.getElementById(`${folderId}-chevron`);
    
    if (content && chevron) {
        const isActive = content.classList.contains('active');
        
        if (isActive) {
            content.classList.remove('active');
            chevron.style.transform = 'rotate(0deg)';
        } else {
            content.classList.add('active');
            chevron.style.transform = 'rotate(180deg)';
        }
    }
}

function toggleAPKDetails(apkId) {
    event.stopPropagation(); // Prevent folder toggle when clicking APK
    
    const details = document.getElementById(`${apkId}-details`);
    if (details) {
        const isActive = details.classList.contains('active');
        
        // Close all other APK details first
        const allDetails = document.querySelectorAll('.apk-details');
        allDetails.forEach(detail => {
            detail.classList.remove('active');
        });
        
        // Toggle current one
        if (!isActive) {
            details.classList.add('active');
        }
    }
}

// Add keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        // Close all open details
        const allDetails = document.querySelectorAll('.apk-details.active');
        allDetails.forEach(detail => {
            detail.classList.remove('active');
        });
    }
});
</script>
@endpush
