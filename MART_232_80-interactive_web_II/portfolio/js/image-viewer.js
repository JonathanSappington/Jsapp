var imgList = '{"normal":["https://static.wixstatic.com/media/eaab725261f9470fbbf2e5674da93ca0.jpg/v1/fill/w_740,h_493,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/eaab725261f9470fbbf2e5674da93ca0.jpg", "https://static.wixstatic.com/media/nsplsh_82c78623a07b45669f3ed60a9048f3d5~mv2.jpg/v1/fill/w_740,h_493,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/nsplsh_82c78623a07b45669f3ed60a9048f3d5~mv2.jpg", "https://static.wixstatic.com/media/11062b_502b8c52b5744e9b97e7c045961f0902~mv2.jpeg/v1/fill/w_740,h_493,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/11062b_502b8c52b5744e9b97e7c045961f0902~mv2.jpeg"]}';

var titleList = '{"normal":["img 01", "img 02", "img 03"]}';
var count = '{"normal": 0}';

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