<template>
  <div class="min-h-screen  bg-black text-white">
    <!-- 🔹 Piercing Gallery Cover -->
<div
  class="w-full h-[60vh] md:h-[420px] relative flex items-center md:items-end justify-center px-4"
  style="background-image: url(''); background-size: cover; background-position: center;"
>
  <!-- Overlay -->
  <div class="absolute inset-0 bg-black/50"></div>

  <!-- SHOP + Icons -->
  <div class="relative z-10 flex items-center gap-6 mb-12">
    <!-- Title -->
    <h1
      class="text-4xl sm:text-5xl md:text-6xl font-extrabold text-white drop-shadow-lg leading-tight"
    >
      ART OF BODY PIERCING GALLERY
    </h1>
  </div>
</div>
    <!-- 🔹 Piercing Gallery Images -->
    <div class="p-8">
      <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto mt-18"
      >
        <div
          v-for="(piercing, index) in piercings"
          :key="index"
          class=" bg-black rounded-2xl shadow-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
          @click="openModal(piercing.image)"
        >
          <img
            :src="piercing.image"
            :alt="'Piercing ' + (index + 1)"
            class="w-full h-72 object-cover"
          />
        </div>
      </div>
    </div>

    <!-- 🔹 Price List Cover -->
    <div class="w-full h-170 relative mt-20">
      <img
        src="/images/piercing/lip.jpg"
        alt="Price List Cover"
        class="w-full h-full object-cover"
      />
      <div class="absolute inset-0 bg-black/50"></div>
      <div class="absolute inset-0 flex items-end justify-center pb-20">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white drop-shadow-lg">
          Price List
        </h1>
      </div>
    </div>

    <!-- 🔹 Price List Images -->
    <div class="p-8 bg-black">
      <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 gap-8 max-w-6xl mx-auto mt-8"
      >
        <div
          v-for="(price, index) in prices"
          :key="index"
          class="bg-gray-900 rounded-2xl shadow-lg overflow-hidden transform transition hover:scale-105 cursor-pointer"
          @click="openModal(price.image)"
        >
          <img
            :src="price.image"
            :alt="'Price ' + (index + 1)"
            class="w-full h-[400px] object-cover"
          />
        </div>
      </div>
    </div>

    <!-- 🔹 Modal (Fullscreen Image) -->
    <div
      v-if="selectedImage"
      class="fixed inset-0 bg-black/80 flex items-center justify-center z-50"
      @click="closeModal"
    >
      <img
        :src="selectedImage"
        alt="Fullscreen"
        class="max-w-4xl max-h-[90vh] rounded-lg shadow-2xl"
      />
    </div>
  </div>
<footer class="bg-gradient-to-t from-black via-gray-900 to-black text-gray-400 py-8 px-4">
  <div class="container mx-auto flex flex-col items-center space-y-6">
    <br><br><br><br><br><br></br>
    
    <!-- Divider -->

    <!-- Social Icons -->
    <div class="flex space-x-8">
      <a href="https://www.facebook.com/junkypiercing" target="_blank" 
         class="transform transition duration-300 hover:scale-125 hover:drop-shadow-[0_0_8px_#3b82f6]">
        <img :src="fbIcon" alt="Facebook" class="h-9 w-9" />
      </a>
      <a href="https://www.instagram.com/theadrenalinejunkypiercinks/" target="_blank"
         class="transform transition duration-300 hover:scale-125 hover:drop-shadow-[0_0_8px_#ec4899]">
        <img :src="igIcon" alt="Instagram" class="h-9 w-9" />
      </a>
    </div>

    <!-- Footer Text -->
    <p class="text-sm tracking-widest text-gray-400 uppercase font-light">
      © 2024 Adrenaline Junky Piercinks — All Rights Reserved
    </p>
  </div>
</footer>



</template>

<script setup>
import { ref } from "vue";
import fbIcon from '@assets/images/fb.png';
import igIcon from '@assets/images/ig.png';

// Gallery images
const piercings = ref([
  
  { image: "/images/piercing/output1.jpg" },
  { image: "/images/piercing/output2.jpg" },
  { image: "/images/piercing/output3.jpg" },
  { image: "/images/piercing/output.jpg" },
  { image: "/images/piercing/output4.jpg" },
  { image: "/images/piercing/output5.jpg" },
  { image: "/images/piercing/output6.jpg" },
  { image: "/images/piercing/output7.jpg" },
]);

// Price list images
const prices = ref([
  { image: "/images/piercing/pl1.jpeg" },
  { image: "/images/piercing/pl2.jpeg" },
  { image: "/images/piercing/pl3.jpeg" },
  { image: "/images/piercing/pl4.jpeg" },
]);

// Modal state
const selectedImage = ref(null);
const openModal = (img) => {
  selectedImage.value = img;
};
const closeModal = () => {
  selectedImage.value = null;
};
</script>

<style>
/* Pwede dagdagan ng custom animation kung gusto mo */
</style>
