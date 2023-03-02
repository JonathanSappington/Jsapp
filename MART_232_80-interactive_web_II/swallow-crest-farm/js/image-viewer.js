
var imgList = '{"normal":["images/pc.png", "images/wireframe_pc.png", "images/tablet.png", "images/wireframe_tablet.png", "images/mobile.png","images/wireframe_mobile.png"],' +
'"alternate":["images/pc_alt.png", "images/wireframe_pc_alt.png", "images/tablet_alt.png", "images/wireframe_tablet_alt.png", "images/mobile_alt.png","images/wireframe_mobile_alt.png"],' +
'"website":["images/homepage.png", "images/aboutus.png", "images/distribution.png", "images/csa_distrib.png", "images/subscription.png","images/blog.png","images/recipes.png","images/events.png","images/contact.png"]}';

var titleList = '{"normal":["Computer Mockup", "Computer Wireframe Mockup", "Tablet Mockup", "Tablet Wireframe Mockup", "Mobile Mockup","Mobile Wireframe Mockup"],' +
'"alternate":["Alt Computer Mockup", "Alt Computer Wireframe Mockup", "Alt Tablet Mockup", "Alt Tablet Wireframe Mockup", "Alt Mobile Mockup","Alt Mobile Wireframe Mockup"],' +
'"website":["Home Page", "About Us Page", "Distribution Page", "(Distribution) CSA Distribution Page", "(Distribution) Subscription Page","Blog Page","(Blog) Recipes Page","(Blog) Events Page","Contact Page"]}';

var count = '{"normal": 0,"alternate": 0, "website": 0}';

const imgGallery = JSON.parse(imgList);
const titleGallery = JSON.parse(titleList);
const countGallery = JSON.parse(count);

function preload(imageArray, type, index) {
        index = index || 0;
        if (imageArray && imageArray.length > index) {
            var img = new Image ();
            img.onload = function() {
                preload(imageArray, type, index + 1);
            }
            img.src = imgGallery[type][index];
		}
}

preload(imgGallery["normal"],"normal",0);
preload(imgGallery["alternate"],"alternate",0);
preload(imgGallery["website"],"website",0);

function changeImage(id, title, selectedGallery, increment)
{
	countGallery[selectedGallery] += increment;
	
	if(countGallery[selectedGallery] >= imgGallery[selectedGallery].length)
		countGallery[selectedGallery] = 0;
	
	if(countGallery[selectedGallery] <= -1)
		countGallery[selectedGallery] = imgGallery[selectedGallery].length - 1;
	
	document.getElementById(id).src = imgGallery[selectedGallery][countGallery[selectedGallery]];
	document.getElementById(title).innerHTML = titleGallery[selectedGallery][countGallery[selectedGallery]];
}