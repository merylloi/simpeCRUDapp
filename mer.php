<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple CRUD App</title>
    <style>
 body {
    font-family: Arial, sans-serif;
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #343434
}

h1 {
    text-align: center;
    color: #f8fcff;
    margin-bottom: 20px;
}

#itemInput {
    width: 70%;
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #236ba7;
    border-radius: 4px;
    font-size: 16px;
}

.create-btn {
    padding: 10px 15px;
    background-color: #236ba7; 
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.create-btn:hover {
    background-color: #236ba7;
    transform: scale(1.008);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background-color: #236ba7;
    box-shadow: 0 2px 4px rgb(255, 255, 255);
}

thead {
    background-color: #236ba7;
    color: white;
}


th, td {
    border: 1px solid #fafafa;
    padding: 12px;
    text-align: left;
    color: white;
}

.update-btn, .delete-btn {
    padding: 5px 10px;
    margin: 0 5px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.update-btn {
    background-color: #17476e; 
    color: white;
}

.update-btn:hover {
    background-color: #236ba7;
}

.delete-btn {
    background-color: #17476e; 
    color: white;
}

.delete-btn:hover {
    background-color: #236ba7;
}
    </style>
</head>
<body>
    <h1>Simple CRUD App</h1>
    <input type="text" id="itemInput" placeholder="Enter an item">
    <button class="create-btn" onclick="createItem()">Add Item</button>
    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="itemTable"></tbody>
    </table>
    <script >let items = [];
        let updateIndex = null;
        
        function renderTable() {
            const table = document.getElementById("itemTable");
            table.innerHTML = "";
            items.forEach((item, index) => {
                table.innerHTML += `
                    <tr>
                        <td>${item}</td>
                        <td>
                            <button class="update-btn" onclick="editItem(${index})">Edit</button>
                            <button class="delete-btn" onclick="deleteItem(${index})">Delete</button>
                        </td>
                    </tr>
                `;
            });
        }
        
        function createItem() {
            const input = document.getElementById("itemInput");
            const value = input.value.trim();
        
            if (!value) {
                alert("Please enter an item!");
                return;
            }
        
            if (updateIndex === null) {
                items.push(value);
            } else {
                items[updateIndex] = value;
                updateIndex = null;
                document.querySelector(".create-btn").textContent = "Add Item";
            }
        
            input.value = "";
            renderTable();
        }
        
        function editItem(index) {
            const input = document.getElementById("itemInput");
            input.value = items[index];
            updateIndex = index;
            document.querySelector(".create-btn").textContent = "Update";
        }
        
        function deleteItem(index) {
            if (confirm("Are you sure you want to delete this item?")) {
                items.splice(index, 1);
                renderTable();
            }
        }</script>
</body>
</html>