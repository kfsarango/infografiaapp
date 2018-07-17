function setup() {
  //createCanvas(400, 400);
  var myCanvas =  createCanvas ( 400 , 400 );
  myCanvas.parent ( 'obj2' );
	input = createInput('hdodla');
	//a = createSelect('hdodla', 'dhj');
  input.position(20, 65);

  input.position(input.width, 65);
  input.mousePressed(greet);

  greeting = createElement('footer');
  qqqq = createElement('label', 'label');
  rrrr = createElement('label', 'label');
  greeting.position(20, 5);
  qqqq.position(20, 50);
  rrrr.position(20, 70);

  textAlign(CENTER);
  textSize(40);
}

function greet() {
  var name = input.value();
  greeting.html(name);
  input.value('');

  push();
  fill(random(255), 255, 255);
  translate(30, 40);
  //rotate(random(2*PI));
  pop();
}