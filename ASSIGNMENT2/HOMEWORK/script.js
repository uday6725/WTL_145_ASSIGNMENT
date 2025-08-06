// Task 1
function changeText() {
    document.getElementById("text1").textContent = "Text Changed!";
  }
  
  // Task 2
  function updateImage() {
    document.getElementById("myImage").src = "https://via.placeholder.com/150/ff0000";
  }
  
  // Task 3
  function changeBackground() {
    document.getElementById("colorBox").style.backgroundColor = "orange";
  }
  
  // Task 4
  function toggleDiv() {
    let el = document.getElementById("toggleDiv");
    el.style.display = el.style.display === "none" ? "block" : "none";
  }
  
  // Task 5
  function addListItem() {
    let li = document.createElement("li");
    li.textContent = "New Item";
    document.getElementById("myList").appendChild(li);
  }
  
  // Task 6
  function deleteElement() {
    document.getElementById("deleteMe").remove();
  }
  
  // Task 7
  function addClass() {
    document.getElementById("styledPara").classList.add("red");
  }
  
  // Task 8
  function showInput() {
    let input = document.getElementById("inputText").value;
    document.getElementById("displayInput").textContent = input;
  }
  
  // Task 9
  let fontSize = 16;
  function increaseFont() {
    fontSize += 2;
    document.getElementById("resizeText").style.fontSize = fontSize + "px";
  }
  function decreaseFont() {
    fontSize -= 2;
    document.getElementById("resizeText").style.fontSize = fontSize + "px";
  }
  
  // Task 10
  function countChars() {
    let text = document.getElementById("charArea").value;
    document.getElementById("charCount").textContent = text.length;
  }
  