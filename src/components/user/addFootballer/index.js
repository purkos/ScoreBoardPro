const height = document.getElementById("height");
const weight = document.getElementById("weight");
const heightValue = document.getElementById("heightValue");
const weightValue = document.getElementById("weightValue");

height.addEventListener("input", () => {
  heightValue.textContent = height.value + " cm";
});
weight.addEventListener("input", () => {
  weightValue.textContent = weight.value + " kg";
});