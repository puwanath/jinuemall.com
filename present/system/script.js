function goBack()
  {
  window.history.back()
  }
function ShowHide(show,hide){ // �ѧ��������Ѻ �ʴ� (Show) �觤�� id �ͧ DIV ���� Table TD TR
	document.getElementById(show).style.display = ''; 
	document.getElementById(hide).style.display = 'none'; 
}
function ShowShow(show1,show2){
	document.getElementById(show1).style.display = ''; 
	document.getElementById(show2).style.display = '';
}
function HideHide(hide1,hide2){ 
	document.getElementById(hide1).style.display = 'none'; 
	document.getElementById(hide2).style.display = 'none'; 
}