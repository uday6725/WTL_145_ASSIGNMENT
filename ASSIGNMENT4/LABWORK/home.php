<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student CRUD</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        button {
            margin: 2px;
        }
    </style>
</head>
<body>
    <h2>Student CRUD Application</h2>
    
    Student Name: <input type="text" id="id1"><br><br>
    Enter Marks: <input type="text" id="id2"><br><br>
    
    <button type="button" id="btn">ADD STUDENT</button>
    
    <h3>Student Records:</h3>
    <div id="div"></div>

    <script>
    // CREATE
    async function senddata() {
        let sname = document.getElementById("id1").value;
        let smarks = document.getElementById("id2").value;

        if (!sname || !smarks) {
            alert("Please enter both name and marks!");
            return;
        }

        let data = new FormData();
        data.append("action", "create");
        data.append("sname", sname);
        data.append("smarks", smarks);

        let res = await fetch("http://localhost/uday/test.php", {
            method: "POST",
            body: data
        });
        let result = await res.text();
        document.getElementById("div").innerHTML = result;

        document.getElementById("id1").value = "";
        document.getElementById("id2").value = "";
    }

    // READ
    async function getdata() {
        let res = await fetch("http://localhost/uday/test.php");
        let result = await res.text();
        document.getElementById("div").innerHTML = result;
    }

    // DELETE
    async function deletedata(id) {
        let data = new FormData();
        data.append("action", "delete");
        data.append("id", id);

        let res = await fetch("http://localhost/uday/test.php", {
            method: "POST",
            body: data
        });
        let result = await res.text();
        document.getElementById("div").innerHTML = result;
    }

    // UPDATE
    async function updatedata(id) {
        let newmarks = prompt("Enter new marks:");
        if (newmarks === null || newmarks.trim() === "") return;

        let data = new FormData();
        data.append("action", "update");
        data.append("id", id);
        data.append("marks", newmarks);

        let res = await fetch("http://localhost/uday/test.php", {
            method: "POST",
            body: data
        });
        let result = await res.text();
        document.getElementById("div").innerHTML = result;
    }

    document.getElementById("btn").addEventListener("click", senddata);
    window.onload = getdata;
    </script>
</body>
</html>
