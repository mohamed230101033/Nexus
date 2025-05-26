@extends('layouts.nexus')

@section('title', 'Second Semester - Advanced Cybersecurity Research')

@push('styles')
<style>
    /* Interconnected Research Areas Design */
    .research-network {
        position: relative;
        padding: 4rem 0;
    }
    
    .research-node {
        position: relative;
        background: linear-gradient(135deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
        border: 2px solid transparent;
        border-radius: 1.5rem;
        padding: 2rem;
        cursor: pointer;
        transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        backdrop-filter: blur(20px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        z-index: 10;
    }
    
    .research-node:before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 1.5rem;
        padding: 2px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899, #f59e0b, #10b981);
        mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
        mask-composite: exclude;
        -webkit-mask-composite: xor;
        animation: borderFlow 6s linear infinite;
    }
    
    @keyframes borderFlow {
        0% { background: linear-gradient(135deg, #3b82f6, #8b5cf6, #ec4899, #f59e0b, #10b981); }
        25% { background: linear-gradient(225deg, #8b5cf6, #ec4899, #f59e0b, #10b981, #3b82f6); }
        50% { background: linear-gradient(315deg, #ec4899, #f59e0b, #10b981, #3b82f6, #8b5cf6); }
        75% { background: linear-gradient(45deg, #f59e0b, #10b981, #3b82f6, #8b5cf6, #ec4899); }
        100% { background: linear-gradient(135deg, #10b981, #3b82f6, #8b5cf6, #ec4899, #f59e0b); }
    }
    
    .research-node:hover {
        transform: translateY(-10px) scale(1.05);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4);
    }
    
    .research-node:hover:before {
        animation-duration: 2s;
    }
    
    /* Connection Lines */
    .connection-line {
        position: absolute;
        background: linear-gradient(90deg, transparent, #3b82f6, transparent);
        height: 2px;
        z-index: 1;
        animation: dataFlow 3s ease-in-out infinite;
    }
    
    @keyframes dataFlow {
        0%, 100% { opacity: 0.3; transform: scaleX(1); }
        50% { opacity: 1; transform: scaleX(1.2); }
    }
    
    /* Central Hub */
    .central-hub {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, #1e293b, #0f172a);
        border: 3px solid #3b82f6;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 20;
        box-shadow: 0 0 40px rgba(59, 130, 246, 0.4);
        animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.4); }
        50% { box-shadow: 0 0 60px rgba(59, 130, 246, 0.8); }
    }
    
    /* Phase Navigation Tabs */
    .phase-tab {
        background: linear-gradient(135deg, rgba(30, 41, 59, 0.8), rgba(15, 23, 42, 0.9));
        border: 2px solid rgba(59, 130, 246, 0.3);
        color: #94a3b8;
        transition: all 0.4s ease;
    }
    
    .phase-tab.active {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-color: #60a5fa;
        color: white;
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
    }
    
    .phase-tab:hover:not(.active) {
        border-color: #60a5fa;
        color: white;
        transform: translateY(-2px);
    }
    
    /* Research Area Icons */
    .research-icon {
        width: 4rem;
        height: 4rem;
        border-radius: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        position: relative;
        overflow: hidden;
    }
    
    .research-icon::before {
        content: '';
        position: absolute;
        inset: 0;
        background: inherit;
        filter: blur(10px);
        opacity: 0.3;
    }
    
    .research-icon i {
        position: relative;
        z-index: 2;
    }
    
    /* Hover Effects */
    .research-node:hover .research-icon {
        animation: iconGlow 1s ease-in-out infinite alternate;
    }
    
    @keyframes iconGlow {
        from { filter: brightness(1); }
        to { filter: brightness(1.5); }
    }
    
    /* Status Indicators */
    .status-indicator {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        animation: statusBlink 2s ease-in-out infinite;
    }
    
    @keyframes statusBlink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.3; }
    }
    
    .status-active { background: #10b981; }
    .status-development { background: #f59e0b; }
    .status-research { background: #3b82f6; }
</style>
@endpush
