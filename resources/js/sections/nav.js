/*===================================
=            MENU TOGGLE            =
===================================*/

//on load, menu-item's are hidden
$('#menu-container-right .hidable').hide();
//on clicking the first element of the menu, we'll toggle the other items
$('#menu-item-1').on('click', toggleMenu);

/**
*
* Toggling menu items
* @author Derrick Roccka
**/

function toggleMenu(){
	$('#menu-container-right .hidable').toggle(350);
}

/*-----  End of MENU TOGGLE  ------*/



