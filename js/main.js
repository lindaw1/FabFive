

//*********************************************************************************** */
// Navigation bar animation
let barBxsoxClickOrder = 0;
let barBox = document.getElementById("barBox");

barBox.axddEventListener("mouseenter",()=>{
    barBox.style.height="calc(70/160*100%)";
    if (barBoxClickOrder===0){
        barIconContainer.style.backgroundColor="rgba(255,255,255,1)";
    }
});
barBox.addEventListener("mouseleave",()=>{
    barBox.style.height="calc(50/160*100%)";
    if(!barBox) {
        barIconContainer.style.backgroundColor="rgba(255,255,255,0.7)";
    }
});
//*********************************************************************************** */

const endpoint = 'https://gist.githubusercontent.com/Miserlou/c5cd8364bf9b2420bb29/raw/2bf258763cdddd704f8ffd3ea9a3e81d25e2c6f6/cities.json';
const cities = [];
const searchInput = document.querySelector('.search');
const suggestions = document.querySelector('.suggestions')

fetch(endpoint)
.then(data => data.json())
.then(data => cities.push(...data));

function findMatches(placeToMatch){
  const regex = new RegExp(placeToMatch, 'gi')
  return cities.filter(place => {

    return place.city.match(regex) || place.state.match(regex);
  })
}

function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function displayMatches(){
  const matchArray = findMatches(this.value, cities);
  const html = matchArray.map(place => {
    const regex = new RegExp(this.value, 'gi');
    const cityName = place.city.replace(regex, `<span class="hl"> ${this.value}</span>`);
    const stateName = place.state.replace(regex, `<span class="hl"> ${this.value}</span>`);
    return `
    <li>
    <span class ='name'> ${cityName}, ${stateName}</span>
    <span class ='population'> ${numberWithCommas(place.population)}</span>
    </li>
    `;
  }).join('');
  suggestions.innerHTML = html;
}
searchInput.addEventListener('change',displayMatches);
searchInput.addEventListener('keyup',displayMatches);
// Scroll to pause video
window.onscroll = function(){
    var homeDisplay = document.getElementById("homeDisplay");
    var videoHeight = homeDisplay.clientHeight*0.3;

    if ( window.pageYOffset > homeDisplay.clientHeight*0.6 && window.pageYOffset < homeDisplay.clientHeight) {
        window.pageYOffset.clientX =190px;
    }
};
// ****************************************************************************************
// Mouse Move Jiggle images on index page
// just setting up some clickybois 🐁

const r = (a, b) => Math.floor(Math.random() * (b - a + 1)) + a;

document.body.addEventListener('click', e => {
  const a = r(0, 1);
  e.currentTarget.style.setProperty('--line', `${r(3, 7)}px`)
  e.currentTarget.style.setProperty('--alt', `${r(1, 7)}px`);
  e.currentTarget.style.setProperty('--angle', `${r(-15, 15)}deg`);
  e.currentTarget.style.setProperty(a === 0 ? '--cx' : '--cy', `${r(0, 100)}%`);
  e.currentTarget.style.setProperty(a === 0 ? '--cy' : '--cx', `${r(0, 1) * 120 - 10}%`);
  e.currentTarget.style.setProperty('--sx', `${r(50, 100)}%`);
  e.currentTarget.style.setProperty('--sy', `${r(50, 100)}%`);
  e.currentTarget.className = `${r(0, 1) === 0 ? 'r ' : ''}${r(0, 3) === 0 ? 's ' : ''}${r(0, 3) === 0 ? 'c ' : ''}`;
});
// ********************************************************************************************
// login validation
Splitting();
const $ = document.querySelectorAll.bind(document);
const chars = document.querySelectorAll('.char');
const config = {
  delay: 1,
  repeat: 1,
  yoyo: true,
};
const id = {};
const elements = {
  one: '.col1-row1',
  two: '.col2-row1',
  three: '.col3-row1',
  four: '.col4-row1',
  five: '.col1-row2',
  six: '.col2-row2',
  seven: '.col3-row2',
  eight: '.col4-row2',
  nine: '.col1-row3',
  ten: '.col2-row3',
  eleven: '.col3-row3',
  twelve: '.col4-row3',
  thirteen: '.col1-row4',
  fourteen: '.col2-row4',
  fifteen: '.col3-row4',
  sixteen: '.col4-row4',
};

Object.keys(elements).forEach(key => {
  id[key] = $(`${elements[key]} .triangle`);
});

const tl = new TimelineMax(config);

const explodeTime = 2;
const explodeEase = SlowMo.ease.config(0.7, 0.7, false);


tl
  .to(id.one, explodeTime, { x: -500, y: -500, ease: explodeEase }, 'explode')
  .to(id.two, explodeTime, { x: 400, y: -500, ease: explodeEase }, 'explode')
  .to(id.three, explodeTime, { x: -400, y: -500, ease: explodeEase }, 'explode')
  .to(id.four, explodeTime, { x: 500, y: -500, ease: explodeEase }, 'explode')
  .to(id.five, explodeTime, { x: -500, y: -500, rotate: '-30deg', ease: explodeEase }, 'explode')
  .to(id.six, explodeTime, { x: -500, y: 500, rotate: '30deg', ease: explodeEase }, 'explode')
  .to(id.seven, explodeTime, { x: 400, y: -500, rotate: '-30deg', ease: explodeEase }, 'explode')
  .to(id.eight, explodeTime, { x: 500, y: 500, rotate: '30deg', ease: explodeEase }, 'explode')
  .to(id.nine, explodeTime, { x: -500, y: 400, ease: explodeEase }, 'explode')
  .to(id.ten, explodeTime, { x: -600, y: 700, ease: explodeEase }, 'explode')
  .to(id.eleven, explodeTime, { x: 600, y: 700, ease: explodeEase }, 'explode')
  .to(id.twelve, explodeTime, { x: 500, y: 400, ease: explodeEase }, 'explode')
  .to(id.fourteen, explodeTime, { x: -500, y: 500, ease: explodeEase }, 'explode')
  .to(id.fifteen, explodeTime, { x: 500, y: 500, ease: explodeEase }, 'explode')
  .staggerFrom(Array.from(chars), 1.5, { opacity:0, scale:0, y: 80, rotationX: 180, transformOrigin: "0% 50% -50",  ease: Back.easeOut }, 0.01, '-=1.2')

