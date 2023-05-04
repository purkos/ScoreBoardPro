const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
const radius = canvas.width / 2;

function drawClock() {
  // Clear the canvas
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  // Draw the clock face
  ctx.beginPath();
  ctx.arc(radius, radius, radius - 5, 0, 2 * Math.PI);
  ctx.lineWidth = 10;
  ctx.strokeStyle = '#555';
  ctx.stroke();

  // Draw the clock numbers
  ctx.font = '16px Arial';
  ctx.fillStyle = '#555';
  ctx.textAlign = 'center';
  ctx.textBaseline = 'middle';
  ctx.fillText('12', radius, radius - radius / 2.2);
  ctx.fillText('3', radius + radius / 2.2, radius);
  ctx.fillText('6', radius, radius + radius / 2.2);
  ctx.fillText('9', radius - radius / 2.2, radius);

  // Get the current time
  const now = new Date();
  const hours = now.getHours() % 12;
  const minutes = now.getMinutes();
  const seconds = now.getSeconds();

  // Draw the hour hand
  const hourAngle = (hours * Math.PI / 6) + (minutes * Math.PI / (6 * 60)) + (seconds * Math.PI / (360 * 60));
  drawHand(hourAngle, radius * 0.5, 8, '#555');

  // Draw the minute hand
  const minuteAngle = (minutes * Math.PI / 30) + (seconds * Math.PI / (30 * 60));
  drawHand(minuteAngle, radius * 0.7, 6, '#555');

  // Draw the second hand
  const secondAngle = seconds * Math.PI / 30;
  drawHand(secondAngle, radius * 0.9, 2, '#f00');

  // Draw the center circle
  ctx.beginPath();
  ctx.arc(radius, radius, 5, 0, 2 * Math.PI);
  ctx.fillStyle = '#555';
  ctx.fill();
}

function drawHand(angle, length, width, color) {
  ctx.beginPath();
  ctx.lineWidth = width;
  ctx.lineCap = 'round';
  ctx.strokeStyle = color;
  ctx.moveTo(radius, radius);
  ctx.lineTo(radius + Math.sin(angle) * length, radius - Math.cos(angle) * length);
  ctx.stroke();
}

setInterval(drawClock, 1000);
