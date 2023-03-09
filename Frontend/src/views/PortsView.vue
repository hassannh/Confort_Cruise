<template>
    <div class="w-3/4 mx-auto mt-6 mb-6">

        <div class="flex flex-col">
            <h1
                class="text-6xl font-extrabold tracking-tighter text-center text-transparent bg-clip-text bg-gradient-to-r from-purple-500 via-pink-500 to-red-500 mb-4">
                Dashboard Controller</h1>
            <div class="shadow-md sm:rounded-lg mt-4">


                <div class="gap-3 flex flex-row justify-center mb-5">
                    <RouterLink to="/dashboard"> <a
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Cruises</a>
                    </RouterLink>
                    <RouterLink to="/ports">
                        <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Ports</a>
                    </RouterLink>
                    <RouterLink to="/ships">
                        <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Ships</a>
                    </RouterLink>

                </div>



                <div class="inline-block min-w-full align-middle">


                    <div class="overflow-hidden ">


                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>

                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Port ID
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Port Name
                                    </th>
                                    <th scope="col"
                                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Price
                                    </th>
                                    <th scope="col" class="p-4">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700" v-for="port in ports" :key="port.id">

                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ port.name }}
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                        <!-- {{ port.name }} -->
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                                        <a href="<?= URLROOT ?>cruiseController/delete_cruise/<?= $cruise->ID_cruise ?>"
                                            class="text-blue-600 dark:text-blue-500 hover:underline">Delete</a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <a class="btn btn-sm btn-primary mx-5"><i class="fa fa-plus"></i> New Port</a>
        
    </div>
</template>



<script>

import { ref, onMounted } from 'vue';
import axios from 'axios';

export default {
    setup() {
        const ports = ref([]);

        const fetchData = async () => {
            const response = await axios.get('http://localhost/Fill_Rouge/backend/portController/admin_ports');
            ports.value = response.data;
        };


        onMounted(() => {
            fetchData();
            // console.log(response.data);
        });

        return { ports };

    },
};
</script>