/**
 * Quantum Analytics Dashboard - Enhanced Real-time Monitoring
 * Part of the Second Semester Research Lab
 */

class QuantumAnalytics {
    constructor() {
        this.isInitialized = false;
        this.animationFrameId = null;
        this.charts = {};
        this.realTimeData = {
            threats: 0,
            blocked: 0,
            analyzed: 0,
            models: 0
        };
        
        this.init();
    }

    init() {
        if (this.isInitialized) return;
        
        this.setupRealTimeCounters();
        this.createMiniCharts();
        this.startRealTimeUpdates();
        
        this.isInitialized = true;
        console.log('🔬 Quantum Analytics Dashboard initialized');
    }

    setupRealTimeCounters() {
        const counters = [
            { element: 'threats-counter', target: 1247, speed: 50 },
            { element: 'blocked-counter', target: 985, speed: 45 },
            { element: 'analyzed-counter', target: 500, speed: 30 },
            { element: 'models-counter', target: 15, speed: 100 }
        ];

        counters.forEach(counter => {
            this.animateCounter(counter);
        });
    }

    animateCounter({ element, target, speed }) {
        const el = document.getElementById(element);
        if (!el) return;

        let current = 0;
        const increment = target / speed;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            el.textContent = Math.floor(current).toLocaleString();
        }, 50);
    }

    createMiniCharts() {
        this.createThreatChart();
        this.createAnalysisChart();
        this.createPerformanceChart();
    }

    createThreatChart() {
        const canvas = document.getElementById('threat-chart');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const data = this.generateThreatData();
        
        this.charts.threat = new MiniChart(ctx, data, {
            color: '#ef4444',
            gradient: ['#ef4444', '#dc2626']
        });
    }

    createAnalysisChart() {
        const canvas = document.getElementById('analysis-chart');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const data = this.generateAnalysisData();
        
        this.charts.analysis = new MiniChart(ctx, data, {
            color: '#3b82f6',
            gradient: ['#3b82f6', '#1d4ed8']
        });
    }

    createPerformanceChart() {
        const canvas = document.getElementById('performance-chart');
        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const data = this.generatePerformanceData();
        
        this.charts.performance = new MiniChart(ctx, data, {
            color: '#10b981',
            gradient: ['#10b981', '#059669']
        });
    }

    generateThreatData() {
        return Array.from({ length: 20 }, () => Math.random() * 100 + 50);
    }

    generateAnalysisData() {
        return Array.from({ length: 20 }, () => Math.random() * 80 + 60);
    }

    generatePerformanceData() {
        return Array.from({ length: 20 }, () => Math.random() * 90 + 70);
    }

    startRealTimeUpdates() {
        setInterval(() => {
            this.updateRealTimeData();
            this.updateCharts();
        }, 3000);
    }

    updateRealTimeData() {
        // Simulate real-time data updates
        this.realTimeData.threats += Math.floor(Math.random() * 3);
        this.realTimeData.blocked += Math.floor(Math.random() * 2);
        this.realTimeData.analyzed += Math.floor(Math.random() * 1);
        
        // Update displayed values
        const elements = {
            'threats-counter': this.realTimeData.threats + 1247,
            'blocked-counter': this.realTimeData.blocked + 985,
            'analyzed-counter': this.realTimeData.analyzed + 500
        };

        Object.entries(elements).forEach(([id, value]) => {
            const el = document.getElementById(id);
            if (el) {
                this.animateValueChange(el, value);
            }
        });
    }

    animateValueChange(element, newValue) {
        const currentValue = parseInt(element.textContent.replace(/,/g, ''));
        const difference = newValue - currentValue;
        
        if (difference === 0) return;

        const steps = 10;
        const stepValue = difference / steps;
        let step = 0;

        const timer = setInterval(() => {
            step++;
            const value = currentValue + (stepValue * step);
            element.textContent = Math.floor(value).toLocaleString();
            
            if (step >= steps) {
                clearInterval(timer);
                element.textContent = newValue.toLocaleString();
            }
        }, 50);
    }

    updateCharts() {
        Object.values(this.charts).forEach(chart => {
            if (chart && chart.updateData) {
                chart.updateData();
            }
        });
    }

    destroy() {
        if (this.animationFrameId) {
            cancelAnimationFrame(this.animationFrameId);
        }
        
        Object.values(this.charts).forEach(chart => {
            if (chart && chart.destroy) {
                chart.destroy();
            }
        });
        
        this.isInitialized = false;
    }
}

class MiniChart {
    constructor(ctx, data, options = {}) {
        this.ctx = ctx;
        this.data = data;
        this.options = {
            color: options.color || '#3b82f6',
            gradient: options.gradient || ['#3b82f6', '#1d4ed8'],
            ...options
        };
        
        this.setupCanvas();
        this.draw();
    }

    setupCanvas() {
        const canvas = this.ctx.canvas;
        const dpr = window.devicePixelRatio || 1;
        const rect = canvas.getBoundingClientRect();
        
        canvas.width = rect.width * dpr;
        canvas.height = rect.height * dpr;
        
        this.ctx.scale(dpr, dpr);
        canvas.style.width = rect.width + 'px';
        canvas.style.height = rect.height + 'px';
    }

    draw() {
        const { ctx, data, options } = this;
        const canvas = ctx.canvas;
        const width = canvas.width / (window.devicePixelRatio || 1);
        const height = canvas.height / (window.devicePixelRatio || 1);
        
        ctx.clearRect(0, 0, width, height);
        
        // Create gradient
        const gradient = ctx.createLinearGradient(0, 0, 0, height);
        gradient.addColorStop(0, options.gradient[0]);
        gradient.addColorStop(1, options.gradient[1]);
        
        // Draw line
        ctx.beginPath();
        ctx.strokeStyle = options.color;
        ctx.lineWidth = 2;
        ctx.lineCap = 'round';
        ctx.lineJoin = 'round';
        
        const stepX = width / (data.length - 1);
        const maxValue = Math.max(...data);
        const minValue = Math.min(...data);
        const range = maxValue - minValue || 1;
        
        data.forEach((value, index) => {
            const x = index * stepX;
            const y = height - ((value - minValue) / range) * height * 0.8 - height * 0.1;
            
            if (index === 0) {
                ctx.moveTo(x, y);
            } else {
                ctx.lineTo(x, y);
            }
        });
        
        ctx.stroke();
        
        // Add glow effect
        ctx.shadowBlur = 10;
        ctx.shadowColor = options.color;
        ctx.stroke();
    }

    updateData() {
        // Add new data point and remove oldest
        this.data.shift();
        this.data.push(Math.random() * 100 + 50);
        this.draw();
    }

    destroy() {
        if (this.ctx && this.ctx.canvas) {
            this.ctx.clearRect(0, 0, this.ctx.canvas.width, this.ctx.canvas.height);
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    if (window.location.pathname.includes('second-semester')) {
        window.quantumAnalytics = new QuantumAnalytics();
    }
});
