<style>
/*used for category div*/
.image_div {
    position: relative;
    width: 12.5%;
    max-width: 12.5%;
    float: left;
    color: white;
    overflow: hidden;
    border: 1px solid lightgrey;
    transition: all .5s ease;
    background-color: white;

}


.image_div:hover {
    box-shadow: 0 0 10px #888888;
    overflow: visible;
    transform:  scale3d(1.03,1.03,1.03);
    z-index: 200;
    border: none;
    cursor: pointer;
}

.imageOverlay2 {
    opacity: 1;
    width: 100%;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
}


/*used for product box div*/
.w_p{
    width: 99%;
    max-width: 99%;
    height: auto;
    transition: all 1s ease;
}
.w_p:hover{
    box-shadow: 0 0 10px #888888;
    overflow: visible;
    transform:  scale3d(1.01,1.01,1.01);
    z-index: 200;
    border: none;
    cursor: pointer;
}







@media only screen and (max-width: 768px) {

	/*index page media query starts*/
	.image_div {
		position: relative;
		width: 25%;
		max-width: 25%;
		float: left;
		color: white;
		overflow: hidden;
		border: 1px solid lightgrey;
		transition: all .5s ease;
		background-color: white;

	}
	/*index page media query starts*/

}



</style>