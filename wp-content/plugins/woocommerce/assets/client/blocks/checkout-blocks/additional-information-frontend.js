"use strict";(self.webpackChunkwebpackWcBlocksCartCheckoutFrontendJsonp=self.webpackChunkwebpackWcBlocksCartCheckoutFrontendJsonp||[]).push([[2227],{1342:(e,t,i)=>{i.d(t,{A:()=>l});var o=i(7723);const l=({defaultTitle:e=(0,o.__)("Step","woocommerce"),defaultDescription:t=(0,o.__)("Step description text.","woocommerce"),defaultShowStepNumber:i=!0})=>({title:{type:"string",default:e},description:{type:"string",default:t},showStepNumber:{type:"boolean",default:i}})},9470:(e,t,i)=>{i.r(t),i.d(t,{default:()=>E});var o=i(1609),l=i(851),n=i(4656),a=i(2516),s=i(7143),d=i(7594),r=i(1616),c=i(3588),u=i(8755),p=i(4434);const m=()=>{const{additionalFields:e}=(0,s.useSelect)((e=>({additionalFields:e(d.CHECKOUT_STORE_KEY).getAdditionalFields()}))),{setAdditionalFields:t}=(0,s.useDispatch)(d.CHECKOUT_STORE_KEY),i={...e};return 0===a.pt.length?null:(0,o.createElement)(o.Fragment,null,(0,o.createElement)(n.StoreNoticesContainer,{context:u.tG.ORDER_INFORMATION}),(0,o.createElement)(p.l,{id:"additional-information",addressType:"additional-information",onChange:e=>{t(e)},values:i,fields:a.pt}))};var f=i(7723);const h={...(0,i(1342).A)({defaultTitle:(0,f.__)("Additional order information","woocommerce"),defaultDescription:""}),className:{type:"string",default:""},lock:{type:"object",default:{move:!1,remove:!0}}},E=(0,r.withFilteredAttributes)(h)((({title:e,description:t,children:i,className:r})=>{const{showFormStepNumbers:u}=(0,c.O)(),p=(0,s.useSelect)((e=>e(d.CHECKOUT_STORE_KEY).isProcessing()));return 0===a.pt.length?null:(0,o.createElement)(n.FormStep,{id:"additional-information-fields",disabled:p,className:(0,l.A)("wc-block-checkout__additional-information-fields",r),title:e,description:t,showStepNumber:u},(0,o.createElement)(m,null),i)}))}}]);