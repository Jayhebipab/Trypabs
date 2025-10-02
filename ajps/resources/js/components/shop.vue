<template>
  <div class="min-h-screen bg-black text-white relative">
    <!-- 🔹 Cover Photo -->
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
      SHOP
    </h1>

    <!-- Icons -->
    <div class="flex items-center gap-4" >
      <!-- Search Icon -->
      <button @click="toggleSearch" class="hover:scale-110 transition">
        <img src="/images/search.png" alt="Search" class="w-7 h-7" />
      </button>

      <!-- Cart Icon -->
      <button @click="toggleCart" class="hover:scale-110 transition relative">
        <img src="/images/cart.png" alt="Cart" class="w-7 h-7" />
        <!-- Badge -->
        <span
          v-if="cart.length > 0"
          class="absolute -top-2 -right-2 bg-red-600 text-xs font-bold px-2 py-0.5 rounded-full"
        >
          {{ cart.length }}
        </span>
      </button>
    </div>
  </div>
</div>


    <!-- 🔹 Products -->
    <div class="p-8">
      <div
        class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto mt-8"
      >
        <div
          v-for="(item, index) in piercingProducts"
          :key="index"
          class="bg-gray-900 rounded-2xl shadow-lg overflow-hidden hover:scale-105 transform transition"
        >
          <img :src="item.image" :alt="item.title" class="w-full h-73 object-cover" />
          <div class="p-6">
            <h2 class="text-2xl font-semibold mb-2">{{ item.title }}</h2>
            <p class="text-gray-400 mb-2">{{ item.description }}</p>
            <p class="text-lg font-bold text-yellow-400 mb-4">₱{{ item.price }}</p>

            <div class="flex gap-4">
              <button
                @click="addToCart(item)"
                class="flex-1 bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-700 transition"
              >
                Add to Cart
              </button>
              <button
                @click="buyNow(item)"
                class="flex-1 bg-green-600 px-4 py-2 rounded-lg hover:bg-green-700 transition"
              >
                Buy Now
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- 🔹 Cart Drawer (Right Side) -->
    <transition name="slide">
      <div
        v-if="isCartOpen"
        class="fixed top-0 right-0 h-full w-80 bg-gray-900 shadow-lg z-50 flex flex-col"
      >
        <!-- Header -->
        <div class="flex justify-between items-center p-4 border-b border-gray-700">
          <h2 class="text-xl font-bold">Your Cart</h2>
          <button @click="toggleCart" class="text-gray-400 hover:text-white">✖</button>
        </div>

        <!-- Cart Items -->
        <div class="flex-1 overflow-y-auto p-4 space-y-4">
          <div
            v-if="cart.length === 0"
            class="text-gray-400 text-center mt-10"
          >
            Your cart is empty.
          </div>
          <div
            v-for="(item, index) in cart"
            :key="index"
            class="flex items-center gap-4 bg-gray-800 p-3 rounded-lg"
          >
            <img :src="item.image" class="w-16 h-16 rounded object-cover" />
            <div class="flex-1">
              <h3 class="font-semibold">{{ item.title }}</h3>
              <p class="text-yellow-400">₱{{ item.price }}</p>
            </div>
            <button
              @click="removeFromCart(index)"
              class="text-red-500 hover:text-red-700"
            >
              ✖
            </button>
          </div>
        </div>

        <!-- Footer Checkout -->
        <div class="p-4 border-t border-gray-700">
          <button
            class="w-full bg-green-600 py-2 rounded-lg font-bold hover:bg-green-700 transition"
          >
            Checkout
          </button>
        </div>
      </div>
    </transition>
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

// State
const cart = ref([]);
const isSearchOpen = ref(false);
const isCartOpen = ref(false);

// Functions
const toggleSearch = () => {
  isSearchOpen.value = !isSearchOpen.value;
};

const toggleCart = () => {
  isCartOpen.value = !isCartOpen.value;
};

const addToCart = (item) => {
  cart.value.push(item);
};

const removeFromCart = (index) => {
  cart.value.splice(index, 1);
};

const buyNow = (item) => {
  alert(`Proceeding to checkout: ${item.title}`);
};

// Products
const piercingProducts = ref([
  { title: "Basic Ear Piercing", description: "Safe and stylish ear piercing jewelry.", image: "/images/piercing/item1.jpeg", price: 350 },
  { title: "Nose Piercing", description: "Trendy nose piercing jewelry in various styles.", image: "/images/piercing/item.jpeg", price: 350 },
  { title: "Lip Piercing", description: "Unique lip piercing with durable gold.", image: "/images/piercing/item7.jpeg", price: 350 },
  { title: "Eyebrow Piercing", description: "Modern eyebrow piercing designs.", image: "/images/piercing/item6.jpeg", price: 350 },
  { title: "Belly Piercing", description: "Elegant belly button piercing jewelry.", image: "/images/piercing/item18.jpeg", price: 350 },
  { title: "Cartilage Piercing", description: "Durable cartilage piercing with stylish look.", image: "/images/piercing/item20.jpeg", price: 350 },
]);
</script>

<style>
/* Slide transition for cart drawer */
.slide-enter-from {
  transform: translateX(100%);
}
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease;
}
.slide-leave-to {
  transform: translateX(100%);
}
</style>
