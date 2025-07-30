function addTask() {
    const taskInput = document.getElementById("taskInput");
    const taskText = taskInput.value.trim();
  
    if (taskText === "") {
      alert("Please enter a task.");
      return;
    }
  
    const taskList = document.getElementById("taskList");
  
    const li = document.createElement("li");
    li.textContent = taskText;
  
    const completeBtn = document.createElement("span");
    completeBtn.textContent = "✅";
    completeBtn.className = "complete";
    completeBtn.onclick = function () {
      li.classList.toggle("completed");
    };
  
    const deleteBtn = document.createElement("span");
    deleteBtn.textContent = "❌";
    deleteBtn.className = "delete";
    deleteBtn.onclick = function () {
      taskList.removeChild(li);
    };
  
    li.appendChild(completeBtn);
    li.appendChild(deleteBtn);
    taskList.appendChild(li);
  
    taskInput.value = "";
  }
  