<template>
  <div>
	
     <BrandComponent v-on:brandChange="onBranchChangeReceived" > </BrandComponent>
     <ProductComponent v-bind:products="products"> </ProductComponent>
 	</div>
</template>


<script>
const APP_URI = "http://localhost:8001"

import ProductComponent from './ProductComponent'
import BrandComponent from './BrandComponent'

    export default {
        data() {
            return {
              products: [],
              brands: [],
             
            };
          },
  		     
        mounted() {
            fetch(APP_URI + "/get")
            .then(res => res.json())
            .then(res => {
              this.products = res.data;
            })
            .catch(err => console.log(err));            
        },
        brandMounted() {
            fetch(APP_URI + "/brands")
            .then(res => res.json())
            .then(res => {
              this.brands = res.data;
            })
            .catch(err => console.log(err));            
        },
        methods : {
          onBranchChangeReceived(brand) {
            if (brand == "All"){
              fetch(APP_URI + "/get")
                          .then(res => res.json())
                          .then(res => {
                            this.products = res.data;
                          })
              .catch(err => console.log(err));
            } else {
              fetch(APP_URI + "/byBrand/" + brand)
                .then(res => res.json())
                .then(res => {
                    this.products  = res.data;
                })
                .catch(err => console.log(err));                 
            }
         
          }

        },
        components: {
          ProductComponent,
          BrandComponent
        }
         
}


</script>
