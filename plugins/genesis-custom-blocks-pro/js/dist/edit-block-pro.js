(()=>{var e={154:e=>{function t(){return e.exports=t=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var a=arguments[t];for(var l in a)Object.prototype.hasOwnProperty.call(a,l)&&(e[l]=a[l])}return e},t.apply(this,arguments)}e.exports=t}},t={};function a(l){var r=t[l];if(void 0!==r)return r.exports;var s=t[l]={exports:{}};return e[l](s,s.exports,a),s.exports}a.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return a.d(t,{a:t}),t},a.d=(e,t)=>{for(var l in t)a.o(t,l)&&!a.o(e,l)&&Object.defineProperty(e,l,{enumerable:!0,get:t[l]})},a.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),a.r=e=>{"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},(()=>{"use strict";var e={};a.r(e),a.d(e,{classic_text:()=>s,post:()=>o,repeater:()=>n,rich_text:()=>c,taxonomy:()=>i,user:()=>v});var t={};a.r(t),a.d(t,{PostTypeRestSlug:()=>g,TaxonomyTypeRestSlug:()=>p});const l=window.wp.hooks,r=(window.wp.formatLibrary,window.wp.element),s=(window.React,()=>(0,r.createElement)("svg",{className:"MuiSvgIcon-root",focusable:"false",viewBox:"0 0 24 24","aria-hidden":"true"},(0,r.createElement)("path",{d:"M20 5H4c-1.1 0-1.99.9-1.99 2L2 17c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm-9 3h2v2h-2V8zm0 3h2v2h-2v-2zM8 8h2v2H8V8zm0 3h2v2H8v-2zm-1 2H5v-2h2v2zm0-3H5V8h2v2zm9 7H8v-2h8v2zm0-4h-2v-2h2v2zm0-3h-2V8h2v2zm3 3h-2v-2h2v2zm0-3h-2V8h2v2z"}))),o=()=>(0,r.createElement)("svg",{className:"MuiSvgIcon-root",focusable:"false",viewBox:"0 0 24 24","aria-hidden":"true"},(0,r.createElement)("path",{d:"M17 3H7c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H7V5h10v14z"})),n=()=>(0,r.createElement)("svg",{className:"MuiSvgIcon-root",focusable:"false",viewBox:"0 0 24 24","aria-hidden":"true"},(0,r.createElement)("path",{d:"M7 7h10v3l4-4-4-4v3H5v6h2V7zm10 10H7v-3l-4 4 4 4v-3h12v-6h-2v4z"})),c=()=>(0,r.createElement)("svg",{className:"MuiSvgIcon-root",focusable:"false",viewBox:"0 0 24 24","aria-hidden":"true"},(0,r.createElement)("path",{d:"M10 4v3h2.21l-3.42 8H6v3h8v-3h-2.21l3.42-8H18V4z"})),i=()=>(0,r.createElement)("svg",{className:"MuiSvgIcon-root",focusable:"false",viewBox:"0 0 24 24","aria-hidden":"true"},(0,r.createElement)("path",{d:"M12 2l-5.5 9h11z"}),(0,r.createElement)("circle",{cx:"17.5",cy:"17.5",r:"4.5"}),(0,r.createElement)("path",{d:"M3 13.5h8v8H3z"})),v=()=>(0,r.createElement)("svg",{className:"MuiSvgIcon-root",focusable:"false",viewBox:"0 0 24 24","aria-hidden":"true"},(0,r.createElement)("path",{d:"M12 5.9c1.16 0 2.1.94 2.1 2.1s-.94 2.1-2.1 2.1S9.9 9.16 9.9 8s.94-2.1 2.1-2.1m0 9c2.97 0 6.1 1.46 6.1 2.1v1.1H5.9V17c0-.64 3.13-2.1 6.1-2.1M12 4C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z"}));var m=a(154),u=a.n(m);const d=window.wp.data,h=e=>{let{handleOnChange:t,id:a,options:l,value:s,setting:o}=e;const n=void 0===s?o.default:s;return(0,r.createElement)(r.Fragment,null,(0,r.createElement)("label",{className:"text-sm",htmlFor:a},o.label),(0,r.createElement)("select",{value:n,id:a,name:a,className:"flex items-center w-full h-8 rounded-sm border border-gray-600 mt-2 px-2 text-sm",onChange:e=>{e.target&&t(e.target.value)}},l&&l.length?l.map((e=>(0,r.createElement)("option",{value:e.value,key:`select-option-${e.value}`},e.label))):null))},g=e=>{const t=(0,d.useSelect)((e=>{const t=e("core").getPostTypes({per_page:50});return t&&t.length?t.reduce(((e,t)=>"attachment"!==t.slug&&t.viewable?(e.push({value:t.rest_base?t.rest_base:t.slug,label:t.labels&&t.labels.name?t.labels.name:t.slug}),e):e),[]):[]}),[]),a=`post-type-setting-${e.setting.name}`;return(0,r.createElement)(h,u()({},e,{id:a,options:t}))},p=e=>{const t=(0,d.useSelect)((e=>{const t=e("core").getTaxonomies();return t&&t.length?t.reduce(((e,t)=>t.visibility&&t.visibility.public?(e.push({value:t.rest_base?t.rest_base:t.slug,label:t.labels&&t.labels.name?t.labels.name:t.slug}),e):e),[]):[]}),[]);return(0,r.createElement)(h,u()({},e,{options:t,id:`taxonomy-type-setting-${e.setting.name}`}))};(0,l.addFilter)("genesisCustomBlocks.getFieldIcon","genesisCustomBlocksPro/addFieldIcon",((t,a)=>e[a]?e[a]:t)),(0,l.addFilter)("genesisCustomBlocks.getSettingsComponent","genesisCustomBlocksPro/addSettingsComponent",((e,a)=>t[a]?t[a]:e))})()})();