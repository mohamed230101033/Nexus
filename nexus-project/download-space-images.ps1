# PowerShell script to download space background and cyber attack images
# Note: Some image sites block direct downloading. You may need to download some images manually.

# Create directories if they don't exist
New-Item -Path "public\images" -ItemType Directory -Force
New-Item -Path "public\images\cyber-attacks" -ItemType Directory -Force
New-Item -Path "public\sounds" -ItemType Directory -Force

Write-Host "IMPORTANT NOTE: Some images may fail to download due to website restrictions."
Write-Host "If images fail to download, please manually download them from the URLs in public\images\README.md"
Write-Host ""

Write-Host "Attempting to download space background images..."
# We'll try, but these might fail due to hotlink protection
try {
    # High-quality space background
    Invoke-WebRequest -Uri "https://images.unsplash.com/photo-1534796636912-3b95b3ab5986?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2071&q=80" -OutFile "public\images\space-bg.jpg" -ErrorAction SilentlyContinue
    Write-Host "Downloaded space-bg.jpg successfully." -ForegroundColor Green
} catch {
    Write-Host "Failed to download space-bg.jpg. Please download manually." -ForegroundColor Yellow
}

Write-Host "Attempting to download cyber attack images..."
try {
    # Morris Worm image
    Invoke-WebRequest -Uri "https://cdn.pixabay.com/photo/2017/01/25/12/31/bitcoin-2007769_1280.jpg" -OutFile "public\images\cyber-attacks\morris-worm.jpg" -ErrorAction SilentlyContinue
    Write-Host "Downloaded morris-worm.jpg successfully." -ForegroundColor Green
} catch {
    Write-Host "Failed to download morris-worm.jpg. Please download manually." -ForegroundColor Yellow
}

try {
    # ILOVEYOU virus image
    Invoke-WebRequest -Uri "https://cdn.pixabay.com/photo/2018/05/22/00/40/cyber-security-3420260_1280.jpg" -OutFile "public\images\cyber-attacks\i-love-you.jpg" -ErrorAction SilentlyContinue
    Write-Host "Downloaded i-love-you.jpg successfully." -ForegroundColor Green
} catch {
    Write-Host "Failed to download i-love-you.jpg. Please download manually." -ForegroundColor Yellow
}

try {
    # Stuxnet image
    Invoke-WebRequest -Uri "https://cdn.pixabay.com/photo/2020/03/01/07/27/information-security-4892506_1280.jpg" -OutFile "public\images\cyber-attacks\stuxnet.jpg" -ErrorAction SilentlyContinue
    Write-Host "Downloaded stuxnet.jpg successfully." -ForegroundColor Green
} catch {
    Write-Host "Failed to download stuxnet.jpg. Please download manually." -ForegroundColor Yellow
}

try {
    # WannaCry image
    Invoke-WebRequest -Uri "https://cdn.pixabay.com/photo/2018/01/11/21/27/matrix-3076813_1280.jpg" -OutFile "public\images\cyber-attacks\wannacry.jpg" -ErrorAction SilentlyContinue
    Write-Host "Downloaded wannacry.jpg successfully." -ForegroundColor Green
} catch {
    Write-Host "Failed to download wannacry.jpg. Please download manually." -ForegroundColor Yellow
}

try {
    # SolarWinds image
    Invoke-WebRequest -Uri "https://cdn.pixabay.com/photo/2015/01/08/18/24/programming-593312_1280.jpg" -OutFile "public\images\cyber-attacks\solarwinds.jpg" -ErrorAction SilentlyContinue
    Write-Host "Downloaded solarwinds.jpg successfully." -ForegroundColor Green
} catch {
    Write-Host "Failed to download solarwinds.jpg. Please download manually." -ForegroundColor Yellow
}

Write-Host "Attempting to download sound effects..."
try {
    # Space Travel Sound
    Invoke-WebRequest -Uri "https://www.soundjay.com/mechanical/sounds/space-ship-2.mp3" -OutFile "public\sounds\space-spaceTravel.mp3" -ErrorAction SilentlyContinue
    Write-Host "Downloaded space-spaceTravel.mp3 successfully." -ForegroundColor Green
} catch {
    Write-Host "Failed to download space-spaceTravel.mp3. Please download manually." -ForegroundColor Yellow
}

Write-Host ""
Write-Host "====================================================="
Write-Host "MANUAL DOWNLOAD INSTRUCTIONS:" -ForegroundColor Cyan
Write-Host "1. Visit URLs in public\images\README.md file"
Write-Host "2. Right-click on images and select 'Save Image As...'"
Write-Host "3. Save to the correct folder with the correct filename:"
Write-Host "   - public\images\space-bg.jpg"
Write-Host "   - public\images\cyber-attacks\morris-worm.jpg"
Write-Host "   - public\images\cyber-attacks\i-love-you.jpg"
Write-Host "   - public\images\cyber-attacks\stuxnet.jpg"
Write-Host "   - public\images\cyber-attacks\wannacry.jpg"
Write-Host "   - public\images\cyber-attacks\solarwinds.jpg"
Write-Host "4. Download a space travel sound from public\sounds\README.md"
Write-Host "   - public\sounds\space-spaceTravel.mp3"
Write-Host "=====================================================" 