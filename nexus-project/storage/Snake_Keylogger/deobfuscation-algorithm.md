# JavaScript Deobfuscation Process
## Method Used: Manual Pattern Analysis

### Step 1: Identifying Real Code vs. Junk Code
1. **Pattern Recognition**
   - Looked for actual executable statements vs. variable declarations
   - Identified that most variable declarations were junk code
   - Found the key ActiveXObject pattern being used

2. **Key Line Identification**
```javascript
GzCMjpDjYhhYWHHThilDQVeGymbJltUvtlUrnp = new ActiveXObject(...).GetSpecialFolder(...) + String.fromCharCode(...) + ...
```

### Step 2: String.fromCharCode() Deobfuscation
1. **Mathematical Operations**
   - Each String.fromCharCode() contained simple arithmetic
   - Example calculations:
     - `475-383 = 92` -> `\` (backslash)
     - `90-3 = 87` -> `W`
     - And so on...

2. **Character Mapping**
```javascript
String.fromCharCode(92)  -> "\"
String.fromCharCode(87)  -> "W"
String.fromCharCode(105) -> "i"
String.fromCharCode(110) -> "n"
String.fromCharCode(100) -> "d"
String.fromCharCode(111) -> "o"
String.fromCharCode(119) -> "w"
String.fromCharCode(115) -> "s"
// ... continues to spell out "\WindowsAudio.js"
```

### Step 3: Control Flow Analysis
1. **ActiveXObject Usage**
   - Identified WScript.Shell creation
   - Analyzed GetSpecialFolder system directory access
   - Combined with constructed filename

### Step 4: Final Code Reconstruction
```javascript
// Original obfuscated:
GzCMjpDjYhhYWHHThilDQVeGymbJltUvtlUrnp = new ActiveXObject(...).GetSpecialFolder(...) + 
    String.fromCharCode(475-383) + String.fromCharCode(90-3) + ...

// Deobfuscated to:
targetPath = new ActiveXObject("WScript.Shell").GetSpecialFolder(SYSTEM_FOLDER) + "\\WindowsAudio.js"
```

## Tools and Techniques Used
1. **Manual Code Review**
   - Pattern recognition
   - Mathematical calculation
   - Control flow analysis

2. **String Analysis**
   - Character code mapping
   - ASCII value conversion
   - String concatenation tracking

3. **Code Structure Analysis**
   - Identifying meaningful vs. junk code
   - Following variable assignments
   - Tracing execution flow
