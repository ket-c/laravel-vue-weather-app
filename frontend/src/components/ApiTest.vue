<script>


import UserRow from './UserRow.vue';
import TableHead from './TableHead.vue';
import Modal from './Modal.vue';

export default {
  components: {
    TableHead,
    UserRow,
    Modal
  },
  
   data: () => ({
    apiResponse: null,
    isOpen: false,
    selectedWeatherReport: {
      country: "",
      town: "",
      conditionText: "",
      conditionIcon: "",
      temperature: "",
      timeAgo: "",
      userName: "",
    },
  }),

  created() {
    this.fetchData();
  },

  methods: {
    async fetchData() {
      const url = "http://127.0.0.1:8000";
      this.apiResponse = await (await fetch(url)).json();
    },
    closeModal() {
      this.isOpen = false;
    },
    openModal() {
      this.isOpen = true;
    },
    updateSelectedWeather(
      country,
      town,
      conditionText,
      conditionIcon,
      temperature,
      timeAgo,
      userName
    ) {
      this.selectedWeatherReport.country = country;
      this.selectedWeatherReport.town = town;
      this.selectedWeatherReport.conditionText = conditionText;
      this.selectedWeatherReport.conditionIcon = conditionIcon;
      this.selectedWeatherReport.temperature = temperature;
      this.selectedWeatherReport.timeAgo = timeAgo;
      this.selectedWeatherReport.userName = userName;
      this.openModal();
    },
  },
};
</script>

<template>
  <section class="container px-4 mx-auto">
    <div class="mt-6 md:flex md:items-center md:justify-between">
      <div
        class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700"
      >
        <button
          class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300"
        >
          Users List
          <span v-if="apiResponse" class="text-white"
            >({{ apiResponse.users.length }})</span
          >
        </button>
      </div>

      
    </div>

    <div class="flex flex-col mt-6">
      <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
          <div
            class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg"
          >
            <table
              v-if="apiResponse"
              class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
            >
             <TableHead/>
              <tbody
                class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900"
              >
                <UserRow v-for="user in apiResponse.users" :key="user.id" :user="user" />
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <Modal />
  </section>
</template>
