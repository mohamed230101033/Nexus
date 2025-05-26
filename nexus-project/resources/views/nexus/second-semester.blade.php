@extends('layouts.nexus')

@section('title', 'Second Semester - Research Integration Network | Nexus')

@section('content')
<style>
/* Elegant Serene Background */
.ultra-bg {
    background: 
        radial-gradient(ellipse at top, rgba(59, 130, 246, 0.03) 0%, transparent 50%),
        radial-gradient(ellipse at bottom, rgba(99, 102, 241, 0.02) 0%, transparent 50%),
        linear-gradient(135deg, #0f172a 0%, #1e293b 25%, #334155 50%, #1e293b 75%, #0f172a 100%);
    background-size: 100% 100%, 100% 100%, 400% 400%;
    animation: gentleShift 30s ease infinite;
    position: relative;
    overflow: hidden;
    min-height: 100vh;
}

@keyframes gentleShift {
    0%, 100% { background-position: 0% 0%, 0% 100%, 0% 50%; }
    33% { background-position: 0% 100%, 100% 0%, 100% 50%; }
    66% { background-position: 100% 0%, 0% 100%, 0% 50%; }
}

/* Subtle Ambient Particles */
.particle {
    position: absolute;
    background: radial-gradient(circle, rgba(148, 163, 184, 0.4), transparent);
    border-radius: 50%;
    pointer-events: none;
    animation: gentleFloat 25s infinite linear;
    opacity: 0.1;
    filter: blur(1px);
}

@keyframes gentleFloat {
    0% { transform: translateY(100vh) translateX(0px); opacity: 0; }
    10% { opacity: 0.1; }
    90% { opacity: 0.1; }
    100% { transform: translateY(-50px) translateX(100px); opacity: 0; }
}

/* Failed Network Grid */
.network-grid {
    perspective: 1500px;
    transform-style: preserve-3d;
    position: relative;
}

/* Central Hub - Gentle Integration Nexus */
.central-hub {
    position: relative;
    background: 
        radial-gradient(circle at center, rgba(59, 130, 246, 0.1) 0%, transparent 70%),
        linear-gradient(135deg, rgba(30, 41, 59, 0.9) 0%, rgba(51, 65, 85, 0.95) 100%);
    border: 2px solid rgba(148, 163, 184, 0.3);
    border-radius: 50%;
    width: 200px;
    height: 200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 
        0 0 40px rgba(59, 130, 246, 0.1),
        inset 0 0 30px rgba(148, 163, 184, 0.05),
        0 0 80px rgba(59, 130, 246, 0.05);
    animation: gentleBreathing 8s ease-in-out infinite;
    backdrop-filter: blur(10px);
}

@keyframes gentleBreathing {
    0%, 100% { 
        transform: scale(1); 
        box-shadow: 0 0 40px rgba(59, 130, 246, 0.1), inset 0 0 30px rgba(148, 163, 184, 0.05);
    }
    50% { 
        transform: scale(1.02); 
        box-shadow: 0 0 50px rgba(59, 130, 246, 0.15), inset 0 0 40px rgba(148, 163, 184, 0.08);
    }
}

@keyframes gentleRotation {
    0% { 
        transform: rotate(0deg); 
    }
    100% { 
        transform: rotate(360deg); 
    }
}

/* 🎨 ELEGANT RESEARCH CARDS - PROFESSIONAL STYLING 🎨 */
.research-card {
    background: linear-gradient(145deg, 
        rgba(30, 41, 59, 0.95) 0%, 
        rgba(51, 65, 85, 0.9) 50%, 
        rgba(30, 41, 59, 0.95) 100%);
    border: 1px solid rgba(148, 163, 184, 0.2);
    border-radius: 16px;
    padding: 24px;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(12px);
    position: relative;
    overflow: hidden;
    box-shadow: 
        0 10px 25px -5px rgba(0, 0, 0, 0.1),
        0 0 0 1px rgba(255, 255, 255, 0.05);
}

.research-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(59, 130, 246, 0.05) 50%, 
        transparent 100%);
    transition: left 0.8s ease;
}

.research-card:hover::before {
    left: 100%;
}

.research-card:hover {
    border-color: rgba(59, 130, 246, 0.4);
    box-shadow: 
        0 20px 40px -10px rgba(0, 0, 0, 0.2),
        0 0 0 1px rgba(59, 130, 246, 0.2),
        0 0 60px rgba(59, 130, 246, 0.1);
    transform: translateY(-4px);
}

/* Status Indicators - Elegant & Refined */
.status-indicator {
    position: absolute;
    top: 12px;
    right: 12px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.85), rgba(99, 102, 241, 0.85));
    color: white;
    padding: 6px 12px;
    border-radius: 12px;
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    animation: elegantStatusGlow 6s ease-in-out infinite;
    border: 1px solid rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
}

@keyframes elegantStatusGlow {
    0%, 100% { 
        opacity: 0.9;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
    }
    50% { 
        opacity: 1;
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.3);
    }
}

/* Research Icons - Elegant */
.research-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(99, 102, 241, 0.1));
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 16px;
    border: 1px solid rgba(148, 163, 184, 0.1);
    transition: all 0.4s ease;
}

.research-card:hover .research-icon {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.2), rgba(99, 102, 241, 0.2));
    border-color: rgba(59, 130, 246, 0.3);
    transform: scale(1.05);
}

/* Typography - Elegant & Professional */
.holo-text {
    background: linear-gradient(135deg, #f8fafc, #e2e8f0, #cbd5e1);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-weight: 600;
    filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
}

/* Gentle Ambient Elements */
.ambient-element {
    position: absolute;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(148, 163, 184, 0.1) 0%, transparent 70%);
    pointer-events: none;
    animation: gentleAmbience 20s ease-in-out infinite;
    opacity: 0.3;
}

.ambient-1 {
    top: 15%;
    left: 20%;
    width: 80px;
    height: 80px;
    animation-delay: 0s;
}

.ambient-2 {
    top: 20%;
    right: 25%;
    width: 60px;
    height: 60px;
    animation-delay: 5s;
}

.ambient-3 {
    bottom: 25%;
    left: 30%;
    width: 70px;
    height: 70px;
    animation-delay: 10s;
}

.ambient-4 {
    bottom: 20%;
    right: 20%;
    width: 90px;
    height: 90px;
    animation-delay: 15s;
}

@keyframes gentleAmbience {
    0%, 100% { 
        opacity: 0.1; 
        transform: scale(1);
    }
    50% { 
        opacity: 0.3; 
        transform: scale(1.1);
    }
}

/* 🌟 ELEGANT RESEARCH INTEGRATION GRID - GENTLE & PROFESSIONAL 🌟 */
.research-grid-container {
    position: relative;
    width: 100%;
    height: 85vh;
    max-width: 1400px;
    margin: 0 auto;
    background: 
        radial-gradient(circle at 30% 30%, rgba(59, 130, 246, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 70% 70%, rgba(99, 102, 241, 0.05) 0%, transparent 50%),
        linear-gradient(135deg, rgba(15, 23, 42, 0.97) 0%, rgba(30, 41, 59, 0.95) 100%);
    border-radius: 24px;
    border: 1px solid rgba(148, 163, 184, 0.2);
    box-shadow: 
        0 25px 50px -12px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.05);
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    backdrop-filter: blur(20px);
}

.research-grid-container:hover {
    box-shadow: 
        0 25px 50px -12px rgba(0, 0, 0, 0.4),
        0 0 100px rgba(59, 130, 246, 0.1),
        0 0 0 1px rgba(148, 163, 184, 0.3);
    transform: translateY(-2px);
}

/* 🎯 CENTRAL RAT - GENTLE INTEGRATION HUB 🎯 */
.central-rat {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 20;
    animation: gentleBreath 6s ease-in-out infinite;
}

.central-rat::before {
    content: '';
    position: absolute;
    top: -20px;
    left: -20px;
    right: -20px;
    bottom: -20px;
    background: radial-gradient(circle, rgba(59, 130, 246, 0.1) 0%, transparent 70%);
    border-radius: 50%;
    animation: gentleGlow 8s ease-in-out infinite;
    z-index: -1;
}

@keyframes gentleBreath {
    0%, 100% { 
        transform: translate(-50%, -50%) scale(1);
        filter: drop-shadow(0 10px 25px rgba(59, 130, 246, 0.2));
    }
    50% { 
        transform: translate(-50%, -50%) scale(1.02);
        filter: drop-shadow(0 15px 35px rgba(59, 130, 246, 0.3));
    }
}

@keyframes gentleGlow {
    0%, 100% { 
        opacity: 0.6;
        transform: scale(1);
    }
    50% { 
        opacity: 0.9;
        transform: scale(1.1);
    }
}

/* 📍 CORNER CARDS - ELEGANT POSITIONING 📍 */
.corner-card {
    position: absolute;
    width: 280px;
    z-index: 15;
    animation: gentleFloat 12s ease-in-out infinite;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
}

@keyframes gentleFloat {
    0%, 100% { 
        transform: translateY(0px);
    }
    50% { 
        transform: translateY(-8px);
    }
}

.corner-card:hover {
    transform: translateY(-12px) scale(1.02);
    filter: drop-shadow(0 20px 40px rgba(59, 130, 246, 0.15));
}

/* 🎨 REFINED POSITIONING */
.corner-card-1 { 
    top: 10%; 
    left: 8%; 
    animation-delay: 0s;
}

.corner-card-2 { 
    top: 10%; 
    right: 8%; 
    animation-delay: 3s;
}

.corner-card-3 { 
    bottom: 10%; 
    left: 8%; 
    animation-delay: 6s;
}

.corner-card-4 { 
    bottom: 10%; 
    right: 8%; 
    animation-delay: 9s;
}

/* 🌐 GENTLE CONNECTION LINES - PROFESSIONAL INTEGRATION VISUALIZATION 🌐 */
.connection-line {
    position: absolute;
    height: 2px;
    z-index: 10;
    border-radius: 1px;
    background: linear-gradient(90deg, 
        rgba(148, 163, 184, 0.1) 0%,
        rgba(59, 130, 246, 0.4) 25%,
        rgba(99, 102, 241, 0.5) 50%,
        rgba(59, 130, 246, 0.4) 75%,
        rgba(148, 163, 184, 0.1) 100%);
    animation: gentleDataFlow 8s ease-in-out infinite;
    opacity: 0.7;
    transition: all 0.6s ease;
}

.connection-line::before {
    content: '';
    position: absolute;
    top: -1px;
    left: 0;
    width: 20px;
    height: 4px;
    background: radial-gradient(ellipse, rgba(59, 130, 246, 0.8) 0%, transparent 70%);
    border-radius: 2px;
    animation: dataPacket 6s linear infinite;
}

@keyframes gentleDataFlow {
    0%, 100% { 
        opacity: 0.6;
        filter: blur(0px);
    }
    50% { 
        opacity: 0.9;
        filter: blur(0.5px);
    }
}

@keyframes dataPacket {
    0% { 
        transform: translateX(-20px);
        opacity: 0;
    }
    10%, 90% { 
        opacity: 1;
    }
    100% { 
        transform: translateX(calc(100% + 20px));
        opacity: 0;
    }
}

/* Connection positioning with elegant curves */
.connection-1 {
    width: calc(50% - 140px);
    top: calc(50% - 1px);
    left: calc(8% + 280px);
    transform: rotate(-25deg);
    transform-origin: left center;
    animation-delay: 0s;
}

.connection-2 {
    width: calc(50% - 140px);
    top: calc(50% - 1px);
    right: calc(8% + 280px);
    transform: rotate(25deg);
    transform-origin: right center;
    animation-delay: 2s;
}

.connection-3 {
    width: calc(50% - 140px);
    bottom: calc(50% - 1px);
    left: calc(8% + 280px);
    transform: rotate(25deg);
    transform-origin: left center;
    animation-delay: 4s;
}

.connection-4 {
    width: calc(50% - 140px);
    bottom: calc(50% - 1px);
    right: calc(8% + 280px);
    transform: rotate(-25deg);
    transform-origin: right center;
    animation-delay: 6s;
}

    /* Responsive Design */
    @media (max-width: 768px) {
        .research-grid-container {
            grid-template-columns: 1fr;
            grid-template-rows: auto;
            gap: 1rem;
        }
        
        .central-rat {
            grid-column: 1;
            grid-row: 3;
            order: 3;
        }
          .corner-card-1 { grid-row: 1; order: 1; }
        .corner-card-2 { grid-row: 2; order: 2; }
        .corner-card-3 { grid-row: 4; order: 4; }
        .corner-card-4 { grid-row: 5; order: 5; }
        
        .connection-line {
            display: none;
        }
          .central-rat .research-card {
            transform: none;
            border-width: 2px;
        }
    }/* 🌟 CENTRAL RAT GENTLE ENERGY FIELD - PROFESSIONAL STYLING 🌟 */
.central-rat::before {
    content: '';
    position: absolute;
    top: -40px;
    left: -40px;
    right: -40px;    bottom: -40px;
    background: 
        radial-gradient(circle, transparent 50%, rgba(0, 255, 255, 0.15) 60%, rgba(255, 0, 255, 0.1) 70%, transparent 80%),
        conic-gradient(from 0deg, rgba(0, 255, 255, 0.3), rgba(255, 0, 255, 0.3), rgba(255, 255, 0, 0.3), rgba(0, 255, 0, 0.3), rgba(0, 255, 255, 0.3));
    border-radius: 50%;
    animation: gentleRotation 20s linear infinite;
    pointer-events: none;
    z-index: 1;
    filter: blur(2px);
}

.central-rat::after {
    content: '';
    position: absolute;
    top: -25px;
    left: -25px;    right: -25px;
    bottom: -25px;
    background: 
        radial-gradient(circle, transparent 60%, rgba(255, 255, 0, 0.2) 70%, rgba(0, 255, 255, 0.15) 80%, transparent 90%),
        conic-gradient(from 180deg, rgba(255, 0, 255, 0.4), rgba(0, 255, 255, 0.4), rgba(255, 255, 0, 0.4), rgba(255, 0, 255, 0.4));
    border-radius: 50%;
    animation: gentleRotation 25s linear infinite reverse;
    pointer-events: none;
    z-index: 2;
    filter: blur(1px);
}

/* Professional Enhancement Rings */
.central-rat .research-card::before {
    content: '';
    position: absolute;
    top: -15px;
    left: -15px;
    right: -15px;
    bottom: -15px;
    background: radial-gradient(circle, transparent 70%, rgba(255, 255, 255, 0.1) 80%, transparent 90%);
    border-radius: 50%;
    animation: gentleBreathing 4s ease-in-out infinite;
    pointer-events: none;
    z-index: 3;
}    @media (max-width: 1024px) and (min-width: 769px) {
        .research-grid-container {
            max-width: 900px;
            gap: 1.5rem;
        }
        
        .connection-line {
            height: 1px;
        }
    }

/* Professional Text Effects */
.holo-text {
    background: linear-gradient(45deg, #00ffff, #0099ff, #0066ff, #00ffff);
    background-size: 400% 400%;
    -webkit-background-clip: text;
    background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: holoShimmer 3s ease-in-out infinite;
    text-shadow: 0 0 20px rgba(0, 255, 255, 0.5);
    font-weight: bold;
}

@keyframes holoShimmer {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* Glitch Text Effect */
.glitch-text {
    position: relative;
    animation: glitch 2s infinite;
}

@keyframes glitch {
    0%, 100% { transform: translateX(0); }
    10% { transform: translateX(-2px); }
    20% { transform: translateX(2px); }
    30% { transform: translateX(-1px); }
    40% { transform: translateX(1px); }
    50% { transform: translateX(-2px); }
    60% { transform: translateX(2px); }
    70% { transform: translateX(-1px); }
    80% { transform: translateX(1px); }
    90% { transform: translateX(-2px); }
}

/* Network Connection Messages */
.error-message {
    background: rgba(74, 144, 226, 0.1);
    border: 1px solid #4A90E2;
    border-radius: 10px;
    padding: 15px;
    margin: 10px 0;
    color: #87CEEB;
    font-family: 'Courier New', monospace;
    animation: gentlePulse 2s ease-in-out infinite;
    backdrop-filter: blur(5px);
}

@keyframes gentlePulse {
    0%, 100% { border-color: #4A90E2; color: #87CEEB; }
    50% { border-color: #00BFFF; color: #B0E0E6; }
}

/* 🎨 ENHANCED RESEARCH CARDS - PROFESSIONAL STYLING 🎨 */
.research-card {
    background: linear-gradient(145deg, 
        rgba(26, 26, 46, 0.95) 0%, 
        rgba(22, 33, 62, 0.95) 25%, 
        rgba(15, 52, 96, 0.95) 50%, 
        rgba(22, 33, 62, 0.95) 75%, 
        rgba(26, 26, 46, 0.95) 100%);
    border-radius: 25px;
    padding: 25px;
    margin: 15px;
    transform-style: preserve-3d;
    transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    border: 2px solid rgba(74, 144, 226, 0.4);
    box-shadow: 
        0 20px 40px rgba(0, 0, 0, 0.4),
        inset 0 0 20px rgba(74, 144, 226, 0.08),
        0 0 60px rgba(74, 144, 226, 0.15);
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(15px);
}

.research-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, 
        transparent 0%, 
        rgba(0, 255, 255, 0.15) 30%, 
        rgba(255, 255, 255, 0.1) 50%, 
        rgba(0, 255, 255, 0.15) 70%, 
        transparent 100%);
    transition: left 1s ease;
    z-index: 1;
}

.research-card:hover::before {
    left: 100%;
}

.research-card:hover {
    transform: perspective(800px) rotateY(8deg) rotateX(5deg) translateZ(40px) scale(1.02);
    border-color: rgba(0, 255, 255, 0.8);
    box-shadow: 
        0 30px 60px rgba(0, 255, 255, 0.3),
        inset 0 0 30px rgba(0, 255, 255, 0.15),
        0 0 100px rgba(0, 255, 255, 0.2);
}

/* Central RAT Enhanced Styling */
.central-rat .research-card {
    background: linear-gradient(145deg, 
        rgba(20, 30, 50, 0.98) 0%, 
        rgba(30, 60, 120, 0.98) 25%, 
        rgba(40, 80, 150, 0.98) 50%, 
        rgba(30, 60, 120, 0.98) 75%, 
        rgba(20, 30, 50, 0.98) 100%);
    border: 4px solid rgba(0, 255, 255, 0.6);
    box-shadow: 
        0 0 60px rgba(0, 255, 255, 0.4),
        0 0 120px rgba(255, 0, 255, 0.2),
        inset 0 0 40px rgba(0, 255, 255, 0.1);
    transform: scale(1.15);
}

/* Network Statistics */
.network-stats {
    background: rgba(0, 0, 0, 0.8);
    border: 1px solid #333;
    border-radius: 15px;
    padding: 20px;
    margin: 20px 0;
    font-family: 'Courier New', monospace;
    backdrop-filter: blur(10px);
}

.stat-line {
    display: flex;
    justify-content: space-between;
    margin: 8px 0;
    color: #cccccc;
}

.stat-value {
    color: #87CEEB;
    font-weight: bold;
}

.stat-value.critical {
    color: #4A90E2;
    animation: gentleGlow 1s ease-in-out infinite;
}

@keyframes gentleGlow {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.7; }
}

/* Failed Connection Lines */
.connection-line {
    position: absolute;
    height: 2px;
    background: linear-gradient(90deg, transparent, #4A90E2, #00BFFF, transparent);
    animation: connectionFlicker 2s ease-in-out infinite, dataFlow 4s linear infinite;
    opacity: 0.3;
}

@keyframes connectionFlicker {
    0%, 100% { opacity: 0.1; }
    25% { opacity: 0.8; }
    50% { opacity: 0.2; }
    75% { opacity: 0.6; }
}

@keyframes dataFlow {
    0% { background-position: -200px 0; }
    100% { background-position: 200px 0; }
}

/* Research Nodes - Connecting */
.research-node {
    position: relative;
    background: linear-gradient(135deg, #1a1a2e, #16213e, #0f3460);
    border: 2px solid #4A90E2;
    border-radius: 20px;
    padding: 30px;
    transition: all 0.5s ease;
    animation: nodeConnecting 8s ease-in-out infinite;
    box-shadow: 
        0 10px 30px rgba(74, 144, 226, 0.2),
    inset 0 0 20px rgba(74, 144, 226, 0.1);
}

@keyframes nodeConnecting {
    0%, 100% { transform: translateY(0px) scale(1); }
    25% { transform: translateY(-10px) scale(1.02); }
    50% { transform: translateY(-5px) scale(0.98); }
    75% { transform: translateY(-15px) scale(1.01); }
}

.research-node:hover {
    transform: perspective(500px) rotateY(10deg) rotateX(5deg) translateZ(20px);
    box-shadow: 
        0 20px 50px rgba(74, 144, 226, 0.4),
        inset 0 0 30px rgba(74, 144, 226, 0.2);
    border-color: #00BFFF;
}

/* Research Icons with Professional Effect */
.research-icon {
    background: linear-gradient(135deg, #4A90E2, #00BFFF, #87CEEB);
    border-radius: 15px;
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 20px;
    position: relative;
    overflow: hidden;
    animation: iconShimmer 3s ease-in-out infinite;
}

@keyframes iconShimmer {
    0%, 100% { background-position: -100px 0; }
    50% { background-position: 100px 0; }
}

.research-icon::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    animation: professionalSweep 4s ease-in-out infinite;
}

@keyframes professionalSweep {
    0% { left: -100%; }
    50% { left: 100%; }
    100% { left: -100%; }
}

/* Status Indicators */
.status-indicator {
    position: absolute;
    top: 15px;
    right: 15px;
    background: linear-gradient(135deg, rgba(74, 144, 226, 0.9), rgba(0, 191, 255, 0.9));
    color: white;
    padding: 8px 15px;
    border-radius: 25px;
    font-size: 11px;
    font-weight: bold;
    animation: statusProfessional 3s ease-in-out infinite;
    text-transform: uppercase;
    letter-spacing: 1.2px;
    border: 2px solid rgba(255, 255, 255, 0.3);
    box-shadow: 
        0 0 20px rgba(74, 144, 226, 0.6),
        inset 0 0 10px rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
    z-index: 10;
}

.status-indicator::before {
    content: '';
    position: absolute;
    top: -2px;
    left: -2px;
    right: -2px;
    bottom: -2px;
    background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
    border-radius: 25px;
    animation: statusGlow 2s linear infinite;
}

@keyframes statusProfessional {
    0%, 100% { 
        background: linear-gradient(135deg, rgba(74, 144, 226, 0.9), rgba(0, 191, 255, 0.9));
        transform: scale(1);
        box-shadow: 0 0 20px rgba(74, 144, 226, 0.6);
    }
    25% { 
        background: linear-gradient(135deg, rgba(0, 255, 255, 0.9), rgba(255, 0, 255, 0.9));
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(0, 255, 255, 0.8);
    }
    50% { 
        background: linear-gradient(135deg, rgba(255, 255, 0, 0.9), rgba(0, 255, 0, 0.9));
        transform: scale(1.02);
        box-shadow: 0 0 25px rgba(255, 255, 0, 0.7);
    }
    75% { 
        background: linear-gradient(135deg, rgba(255, 0, 255, 0.9), rgba(0, 255, 255, 0.9));
        transform: scale(1.03);
        box-shadow: 0 0 28px rgba(255, 0, 255, 0.7);
    }
}

@keyframes statusGlow {
    0% { 
        background-position: -100% 0;
        opacity: 0;
    }
    50% { 
        opacity: 1;
    }
    100% { 
        background-position: 100% 0;
        opacity: 0;    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .central-hub {
        width: 150px;
        height: 150px;
    }
    
    .research-node {
        padding: 20px;
    }
    
    .research-icon {
        width: 60px;
        height: 60px;
    }
}
</style>

<!-- Floating Particles Background -->
<div class="particle" style="width: 8px; height: 8px; top: 10%; left: 20%; animation-delay: 0s;"></div>
<div class="particle" style="width: 6px; height: 6px; top: 30%; left: 70%; animation-delay: 2s;"></div>
<div class="particle" style="width: 10px; height: 10px; top: 60%; left: 10%; animation-delay: 4s;"></div>
<div class="particle" style="width: 4px; height: 4px; top: 80%; left: 90%; animation-delay: 6s;"></div>
<div class="particle" style="width: 12px; height: 12px; top: 20%; left: 50%; animation-delay: 8s;"></div>

<div class="ultra-bg min-h-screen relative">
    <div class="container mx-auto px-6 py-12">
          <!-- Integration System Status -->
        <div class="text-center mb-12">
            <div class="error-message mb-8">
                <h1 class="text-4xl font-bold text-white mb-4 holo-text">
                    🔗 RESEARCH INTEGRATION NETWORK - CONNECTING 🔗
                </h1>
                <p class="text-lg text-blue-300 holo-text">
                    CONNECTION MATRIX: [BUILDING] - Integration protocols in development
                </p>
            </div>
        </div>

        <!-- Network Statistics Dashboard -->
        <div class="network-stats mb-12">
            <h3 class="text-xl font-bold text-white mb-4">
                <i class="fas fa-chart-line mr-2"></i>
                NETWORK STATUS DASHBOARD
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="stat-line">
                    <span>Connected Nodes:</span>
                    <span class="stat-value critical">0/5</span>
                </div>
                <div class="stat-line">
                    <span>Integration Status:</span>
                    <span class="stat-value critical">IN PROGRESS</span>
                </div>
                <div class="stat-line">
                    <span>Data Flow:</span>
                    <span class="stat-value critical">BLOCKED</span>
                </div>
                <div class="stat-line">
                    <span>System Health:</span>
                    <span class="stat-value critical">CRITICAL</span>
                </div>
            </div>
        </div>

        <!-- Phase Navigation -->
        <div class="flex justify-center mb-16">
            <div class="bg-black/40 backdrop-blur-sm rounded-2xl p-4 border border-red-500/30">
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#overview" class="px-6 py-3 bg-gradient-to-r from-red-600 to-orange-600 text-white rounded-xl font-bold hover:from-red-500 hover:to-orange-500 transition-all duration-300 border border-red-400">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        Second Semester Overview
                    </a>
                    <a href="#phase1" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-bold hover:from-blue-500 hover:to-purple-500 transition-all duration-300 border border-blue-400">
                        <i class="fas fa-search mr-2"></i>
                        Phase 1: Detailed Research
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Research Integration Network -->
        <div id="overview" class="network-grid relative min-h-screen mb-16">
              <!-- Central Hub - Integration in Progress -->
            <div class="flex justify-center items-center mb-16">
                <div class="central-hub">                    <div class="text-center text-white">
                        <i class="fas fa-network-wired text-3xl mb-2 opacity-80"></i>
                        <div class="text-sm font-semibold tracking-wide">Integration Nexus</div>
                    </div>
                </div>
            </div>

            <!-- Gentle Connection Lines -->
            <div class="connection-line" style="top: 25%; left: 25%; width: 30%; transform: rotate(30deg);"></div>
            <div class="connection-line" style="top: 25%; right: 25%; width: 30%; transform: rotate(-30deg);"></div>
            <div class="connection-line" style="bottom: 35%; left: 20%; width: 35%; transform: rotate(-20deg);"></div>
            <div class="connection-line" style="bottom: 35%; right: 20%; width: 35%; transform: rotate(20deg);"></div>            <!-- Gentle Ambient Elements -->
            <div class="ambient-element ambient-1"></div>
            <div class="ambient-element ambient-2"></div>
            <div class="ambient-element ambient-3"></div>
            <div class="ambient-element ambient-4"></div>

            <!-- Enhanced Research Grid with Central RAT -->
            <div class="research-grid-container relative z-10">        <!-- Enhanced Research Grid with Central RAT -->
        <div class="research-grid-container relative z-10">
            <!-- Corner Card 1: Core Ransomware -->
            <div class="corner-card corner-card-1">                <div class="research-card" data-href="{{ route('nexus.core-ransomware') }}" style="cursor: pointer;">
                        <div class="status-indicator">Ready</div>
                        <div class="research-icon">
                            <i class="fas fa-lock text-slate-300 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4 holo-text">Core Ransomware</h3>
                        <p class="text-gray-300 mb-4">Python-based PoC malware implementation featuring AES-256 encryption, Flask C2 server, and advanced persistence mechanisms.</p>
                        <div class="text-blue-400 text-sm font-medium">
                            <i class="fas fa-circle mr-2 text-xs"></i>
                            Research Module Active
                        </div>
                    </div>
                </div>

                <!-- Central RAT Prototype - MAIN HUB -->
                <div class="central-rat">                    <div class="research-card transform scale-110 border-4 border-cyan-400 shadow-2xl shadow-cyan-400/50 bg-gradient-to-br from-gray-800 via-blue-900 to-purple-900" data-href="{{ route('nexus.rat-prototype') }}" style="cursor: pointer;">
                        <div class="status-indicator bg-cyan-500">Central Hub</div>
                        <div class="research-icon bg-gradient-to-br from-cyan-500 to-blue-600 transform scale-125">
                            <i class="fas fa-robot text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4 holo-text bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">RAT Prototype</h3>
                        <p class="text-gray-200 mb-4 text-center">🎯 <strong>Integration Nexus</strong> 🎯<br/>Remote Access Tool development coordinating all research streams and establishing unified architecture.</p>
                        <div class="text-cyan-300 text-sm font-medium text-center">
                            <i class="fas fa-circle mr-2 text-xs"></i>
                            Coordination Active
                        </div>
                    </div>
                </div>

                <!-- Corner Card 2: Evasion & Stealth -->
                <div class="corner-card corner-card-2">                    <div class="research-card" data-href="{{ route('nexus.evasion-stealth') }}" style="cursor: pointer;">
                        <div class="status-indicator">Aligned</div>
                        <div class="research-icon">
                            <i class="fas fa-eye-slash text-slate-300 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4 holo-text">Evasion & Stealth</h3>
                        <p class="text-gray-300 mb-4">Anti-detection techniques and stealth operation methodologies seeking integration with central command.</p>
                        <div class="text-blue-400 text-sm font-medium">
                            <i class="fas fa-circle mr-2 text-xs"></i>
                            Stealth Protocols Ready
                        </div>
                    </div>
                </div>

                <!-- Corner Card 3: Delivery Methods -->
                <div class="corner-card corner-card-3">                    <div class="research-card" data-href="{{ route('nexus.delivery-methods') }}" style="cursor: pointer;">
                        <div class="status-indicator">Active</div>
                        <div class="research-icon">
                            <i class="fas fa-paper-plane text-slate-300 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4 holo-text">Delivery Methods</h3>
                        <p class="text-gray-300 mb-4">Advanced payload delivery and distribution mechanisms attempting central node integration.</p>
                        <div class="text-blue-400 text-sm font-medium">
                            <i class="fas fa-circle mr-2 text-xs"></i>
                            Delivery Systems Online
                        </div>
                    </div>
                </div>

                <!-- Corner Card 4: Detection & Response -->
                <div class="corner-card corner-card-4">                    <div class="research-card" data-href="{{ route('nexus.detection-response') }}" style="cursor: pointer;">
                        <div class="status-indicator bg-blue-600">Standby</div>
                        <div class="research-icon bg-gradient-to-br from-blue-500 to-cyan-700">
                            <i class="fas fa-shield-alt text-white text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-4 holo-text">Detection & Response</h3>
                        <p class="text-gray-300 mb-4">Advanced threat detection and automated response system awaiting central coordination.</p>
                        <div class="text-cyan-400 text-sm font-medium">
                            <i class="fas fa-circle mr-2 text-xs"></i>
                            Defense Grid Ready
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Phase 1: Detailed Research Content -->
        <div id="phase1" class="hidden">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-white mb-6 holo-text">
                    Phase 1: Detailed Research Areas
                </h2>
                <p class="text-xl text-gray-300">
                    Comprehensive research documentation and findings across all five domains
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">                <!-- Core Ransomware - Detailed -->
                <div class="research-node">
                    <div class="status-indicator">RESEARCH COMPLETE</div>
                    <a href="{{ route('nexus.core-ransomware') }}" class="block">
                        <div class="research-icon">
                            <i class="fas fa-lock text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Core Ransomware Analysis</h3>
                        <p class="text-gray-300 mb-6">
                            Comprehensive analysis of malcore.py - A Python-based proof-of-concept ransomware implementation featuring 
                            AES-256 encryption algorithms, Flask-based command & control server infrastructure, and sophisticated 
                            persistence mechanisms including Windows registry manipulation, scheduled task creation, and startup folder integration.
                        </p>
                        <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                            <div class="bg-blue-900/30 p-3 rounded-lg border border-blue-500/30">
                                <div class="text-blue-400 font-semibold">🔐 Encryption Engine</div>
                                <div class="text-gray-300">AES-256 CBC mode with PKCS7 padding</div>
                            </div>
                            <div class="bg-red-900/30 p-3 rounded-lg border border-red-500/30">
                                <div class="text-red-400 font-semibold">🌐 C2 Infrastructure</div>
                                <div class="text-gray-300">Flask-based command & control server</div>
                            </div>
                            <div class="bg-purple-900/30 p-3 rounded-lg border border-purple-500/30">
                                <div class="text-purple-400 font-semibold">⚙️ Persistence Layer</div>
                                <div class="text-gray-300">Registry + Scheduled Tasks + Startup</div>
                            </div>
                            <div class="bg-green-900/30 p-3 rounded-lg border border-green-500/30">
                                <div class="text-green-400 font-semibold">🎯 Target Scope</div>
                                <div class="text-gray-300">Aggressive file system encryption</div>
                            </div>
                        </div>
                        <div class="text-green-400 font-bold">
                            <i class="fas fa-check-circle mr-2"></i>
                            Malcore.py Documentation: Complete
                        </div>
                    </a>
                </div>

                <!-- RAT Prototype - Detailed -->
                <div class="research-node">
                    <div class="status-indicator">DEVELOPMENT ACTIVE</div>
                    <a href="{{ route('nexus.rat-prototype') }}" class="block">
                        <div class="research-icon">
                            <i class="fas fa-robot text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">RAT Prototype Development</h3>
                        <p class="text-gray-300 mb-6">
                            Remote Access Tool prototype with advanced command and control capabilities. 
                            Research into stealth communication and persistent access mechanisms.
                        </p>
                        <div class="text-blue-400 font-bold">
                            <i class="fas fa-code mr-2"></i>
                            Development Phase: Active
                        </div>
                    </a>
                </div>

                <!-- Evasion & Stealth - Detailed -->
                <div class="research-node">
                    <div class="status-indicator">ANALYSIS PHASE</div>
                    <a href="{{ route('nexus.evasion-stealth') }}" class="block">
                        <div class="research-icon">
                            <i class="fas fa-eye-slash text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Evasion & Stealth Technology</h3>
                        <p class="text-gray-300 mb-6">
                            Advanced anti-detection techniques, sandbox evasion, and stealth operation methodologies. 
                            Research into polymorphic and metamorphic code generation.
                        </p>
                        <div class="text-yellow-400 font-bold">
                            <i class="fas fa-search mr-2"></i>
                            Analysis Phase: Ongoing
                        </div>
                    </a>
                </div>

                <!-- Delivery Methods - Detailed -->
                <div class="research-node">
                    <div class="status-indicator">TESTING PHASE</div>
                    <a href="{{ route('nexus.delivery-methods') }}" class="block">
                        <div class="research-icon">
                            <i class="fas fa-paper-plane text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Advanced Delivery Methods</h3>
                        <p class="text-gray-300 mb-6">
                            Innovative payload delivery mechanisms, including social engineering techniques, 
                            exploit kits, and supply chain infiltration methods.
                        </p>
                        <div class="text-orange-400 font-bold">
                            <i class="fas fa-flask mr-2"></i>
                            Testing Phase: In Progress
                        </div>
                    </a>
                </div>

                <!-- Detection & Response - Detailed -->
                <div class="research-node">
                    <div class="status-indicator">PROTOTYPE READY</div>
                    <a href="{{ route('nexus.detection-response') }}" class="block">
                        <div class="research-icon">
                            <i class="fas fa-shield-alt text-white text-3xl"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-4">Detection & Response Systems</h3>
                        <p class="text-gray-300 mb-6">
                            Advanced threat detection algorithms, behavioral analysis systems, and 
                            automated incident response mechanisms for next-generation security.
                        </p>
                        <div class="text-purple-400 font-bold">
                            <i class="fas fa-rocket mr-2"></i>
                            Prototype Phase: Ready
                        </div>
                    </a>
                </div>

            </div>
        </div>

        <!-- Network Error Messages -->
        <div class="mt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="network-error">
                    <h4 class="font-bold text-red-400 mb-2">
                        <i class="fas fa-exclamation-triangle mr-2"></i>
                        INTEGRATION PROTOCOL FAILURE
                    </h4>
                    <p class="text-sm text-gray-300">
                        Cross-platform communication protocols require additional development work before full network integration can be achieved.
                    </p>
                </div>
                <div class="network-error">
                    <h4 class="font-bold text-orange-400 mb-2">
                        <i class="fas fa-tools mr-2"></i>
                        SYSTEM BRIDGE UNDER CONSTRUCTION
                    </h4>
                    <p class="text-sm text-gray-300">
                        Research nodes operating in isolation until integration framework completion. Expected delivery: Phase 2.
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
            
            
        </div>

        <!-- Network Statistics -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-4 gap-8 bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10">
            <div class="text-center">
                <div class="text-4xl font-bold text-blue-400 mb-2">5</div>
                <div class="text-gray-300 text-sm">Research Domains</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-purple-400 mb-2">∞</div>
                <div class="text-gray-300 text-sm">Connections</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-green-400 mb-2">24/7</div>
                <div class="text-gray-300 text-sm">Active Research</div>
            </div>
            <div class="text-center">
                <div class="text-4xl font-bold text-yellow-400 mb-2">100%</div>
                <div class="text-gray-300 text-sm">Educational Focus</div>
            </div>
        </div>
    </div>

    <!-- Phase 2: Implementation -->
    <div id="phase2" class="phase-content hidden">
        <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-8 border border-white/10 mb-8">
            <h2 class="text-2xl font-bold text-white mb-6 flex items-center">
                <i class="fas fa-cogs text-emerald-400 mr-3"></i>
                Phase 2: Implementation
            </h2>
            <p class="text-gray-300 mb-8">
                Practical implementation phase divided into three comprehensive parts: malware creation for research, 
                detection and defense mechanisms, and statistical analysis of security threats.
            </p>
            
            <div class="space-y-8">
                <!-- Part 1: Creating Malware/Simulations -->
                <div class="implementation-card bg-gradient-to-br from-red-500/10 to-pink-500/10 p-8 rounded-xl border border-red-500/20">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-white mb-2 flex items-center">
                                <i class="fas fa-code text-red-400 mr-3"></i>
                                Part 1: Creating Malware & Simulations
                            </h3>
                            <p class="text-gray-300">Ethical malware development for educational and research purposes in controlled environments.</p>
                        </div>
                        <span class="bg-red-500/20 text-red-300 px-4 py-2 rounded-full text-sm font-medium">Research Only</span>
                    </div>
                    
                    <div class="grid md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-black/20 p-4 rounded-lg">
                            <i class="fas fa-bug text-red-400 text-2xl mb-3"></i>
                            <h4 class="text-white font-semibold mb-2">Proof of Concept Malware</h4>
                            <p class="text-gray-400 text-sm">Developing PoC malware samples to understand attack vectors and payload delivery mechanisms.</p>
                        </div>
                        <div class="bg-black/20 p-4 rounded-lg">
                            <i class="fas fa-desktop text-orange-400 text-2xl mb-3"></i>
                            <h4 class="text-white font-semibold mb-2">Attack Simulations</h4>
                            <p class="text-gray-400 text-sm">Creating realistic attack scenarios for testing defense mechanisms and incident response procedures.</p>
                        </div>
                        <div class="bg-black/20 p-4 rounded-lg">
                            <i class="fas fa-flask text-yellow-400 text-2xl mb-3"></i>
                            <h4 class="text-white font-semibold mb-2">Controlled Testing</h4>
                            <p class="text-gray-400 text-sm">Isolated lab environment testing to ensure safety and prevent accidental deployment.</p>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-red-500/20 text-red-300 rounded-full text-xs">Ethical Hacking</span>
                        <span class="px-3 py-1 bg-orange-500/20 text-orange-300 rounded-full text-xs">Sandboxed Environment</span>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-xs">Research Ethics</span>
                        <span class="px-3 py-1 bg-pink-500/20 text-pink-300 rounded-full text-xs">Academic Purpose</span>
                    </div>
                </div>

                <!-- Part 2: Detection/Defense -->
                <div class="implementation-card bg-gradient-to-br from-blue-500/10 to-cyan-500/10 p-8 rounded-xl border border-blue-500/20">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-white mb-2 flex items-center">
                                <i class="fas fa-shield-alt text-blue-400 mr-3"></i>
                                Part 2: Detection & Defense
                            </h3>
                            <p class="text-gray-300">Advanced detection systems and defensive mechanisms against modern cyber threats.</p>
                        </div>
                        <span class="bg-blue-500/20 text-blue-300 px-4 py-2 rounded-full text-sm font-medium">Defense Systems</span>
                    </div>
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-4">Detection Technologies</h4>
                            <div class="space-y-3">
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-search text-blue-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Behavioral Analytics</div>
                                        <div class="text-gray-400 text-sm">AI-powered anomaly detection</div>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-fingerprint text-cyan-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Signature-based Detection</div>
                                        <div class="text-gray-400 text-sm">Pattern matching and heuristics</div>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-network-wired text-purple-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Network Traffic Analysis</div>
                                        <div class="text-gray-400 text-sm">Deep packet inspection</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h4 class="text-lg font-semibold text-white mb-4">Defense Mechanisms</h4>
                            <div class="space-y-3">
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-wall-brick text-green-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Next-Gen Firewalls</div>
                                        <div class="text-gray-400 text-sm">Application-aware filtering</div>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-eye text-yellow-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">EDR Solutions</div>
                                        <div class="text-gray-400 text-sm">Endpoint detection & response</div>
                                    </div>
                                </div>
                                <div class="flex items-center p-3 bg-black/20 rounded-lg">
                                    <i class="fas fa-robot text-orange-400 mr-3"></i>
                                    <div>
                                        <div class="text-white font-medium">Automated Response</div>
                                        <div class="text-gray-400 text-sm">SOAR platform integration</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Part 3: Analysis/Statistics -->
                <div class="implementation-card bg-gradient-to-br from-purple-500/10 to-indigo-500/10 p-8 rounded-xl border border-purple-500/20">
                    <div class="flex items-start justify-between mb-6">
                        <div>
                            <h3 class="text-2xl font-semibold text-white mb-2 flex items-center">
                                <i class="fas fa-chart-line text-purple-400 mr-3"></i>
                                Part 3: Analysis & Statistics
                            </h3>
                            <p class="text-gray-300">Comprehensive statistical analysis and data visualization of cybersecurity metrics and trends.</p>
                        </div>
                        <span class="bg-purple-500/20 text-purple-300 px-4 py-2 rounded-full text-sm font-medium">Data Science</span>
                    </div>
                    
                    <div class="grid md:grid-cols-4 gap-6 mb-6">
                        <div class="text-center bg-black/20 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-purple-400 mb-2">500+</div>
                            <div class="text-gray-300 text-sm">Threat Samples Analyzed</div>
                        </div>
                        <div class="text-center bg-black/20 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-blue-400 mb-2">95%</div>
                            <div class="text-gray-300 text-sm">Detection Accuracy</div>
                        </div>
                        <div class="text-center bg-black/20 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-green-400 mb-2">15</div>
                            <div class="text-gray-300 text-sm">Statistical Models</div>
                        </div>
                        <div class="text-center bg-black/20 p-4 rounded-lg">
                            <div class="text-3xl font-bold text-yellow-400 mb-2">24/7</div>
                            <div class="text-gray-300 text-sm">Monitoring Coverage</div>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-purple-500/20 text-purple-300 rounded-full text-xs">Statistical Analysis</span>
                        <span class="px-3 py-1 bg-blue-500/20 text-blue-300 rounded-full text-xs">Data Visualization</span>
                        <span class="px-3 py-1 bg-green-500/20 text-green-300 rounded-full text-xs">Threat Intelligence</span>
                        <span class="px-3 py-1 bg-yellow-500/20 text-yellow-300 rounded-full text-xs">Risk Assessment</span>
                    </div>
                </div>
            </div>        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Handle clicks on research cards with data-href attributes
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('[data-href]').forEach(function(element) {
            element.addEventListener('click', function() {
                window.location.href = this.getAttribute('data-href');
            });
        });
    });

    function showPhase(phase) {
        // Hide all phases
        document.querySelectorAll('.phase-content').forEach(content => {
            content.classList.add('hidden');
        });
        
        // Remove active class from all buttons
        document.querySelectorAll('.phase-tab').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Show selected phase
        document.getElementById(phase).classList.remove('hidden');

        document.getElementById(phase + '-btn').classList.add('active');
        
        // Smooth scroll to content
        document.getElementById(phase).scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start' 
        });
    }

    function navigateToResearch(researchArea) {
        // Navigate to detailed research pages
        switch(researchArea) {
            case 'core-ransomware':
                window.location.href = '{{ route("nexus.core-ransomware") }}';
                break;
            case 'rat-prototype':
                window.location.href = '{{ route("nexus.rat-prototype") }}';
                break;
            case 'evasion-stealth':
                window.location.href = '{{ route("nexus.evasion-stealth") }}';
                break;
            case 'delivery-methods':
                window.location.href = '{{ route("nexus.delivery-methods") }}';
                break;
            case 'detection-response':
                window.location.href = '{{ route("nexus.detection-response") }}';
                break;
            default:
                console.log('Research area not found:', researchArea);
        }
    }    document.addEventListener('DOMContentLoaded', function() {
        // Initialize without showing any specific phase to avoid URL fragments
        // Default content is already visible
        
        // Add hover effects to research nodes
        const researchNodes = document.querySelectorAll('.research-node');
        researchNodes.forEach(node => {
            node.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.05)';
            });
            
            node.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Animate connection lines
        const connectionLines = document.querySelectorAll('.connection-line');
        connectionLines.forEach((line, index) => {
            line.style.animationDelay = `${index * 0.5}s`;
        });    });
</script>

@endsection
