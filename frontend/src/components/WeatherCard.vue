<template>
  <div>
    <div class="mt-4">
      <h2 class="font-bold text-gray-600 ">{{town}}, {{country}}</h2>
    </div>
    <div class="my-6">
      <div class="flex flex-row space-x-4 items-center">
        <div id="icon">
         <img :src="'http:'+conditionIcon" alt="">
        </div>
        <div id="temp">
          <h4 class="text-4xl"> {{temperature}} &deg;C</h4>
          <p class="text-xs text-gray-500">{{conditionText}} </p>
          <p><strong><small>{{timeAgo}}</small></strong></p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  components: {},
  props: {
    country: { required: true, type: String },
    town: { required: true, type: String },
    conditionText: { required: true, type: String },
    conditionIcon: { required: true, type: String },
    temperature: { required: true, type: String },
    timeAgo: { required: true, type: String },
  },
};
</script>
