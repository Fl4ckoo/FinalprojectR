<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        
                        <div class="flex">

                            <div class="w-1/2">
                                <div id="map" 
                                    class="relative w-full h-96"
                                ></div>
                            </div>
                            <div class="w-1/2 relative">
                              <div class="block bg-white shadow rounded relative p-3">
                                <h3>Select Country!</h3>
                                <Select2 
                                v-model="visitedCountry" 
                                :settings="{ width: '80%', 
                                ajax: { 
                                     url: '/api/countries/list',
                                     dataType: 'json'
                                     } 
                                }" 
                                @select="selectVisitedCountry($event)" 
                                />
                                <a @click="addVisitedCountry" class="rounded bg-green-300 hover:bg-green-400 px-4 py-1 shadow pointer
                                    absolute right-3 top-8
                                ">Add</a>
                                <br />
                                <div v-for="country in visitedCountries" :key="country.id"
                                    class = "p-2 border-b-2 relative"
                                > 
                                    <h1 class="text-gray-700 text-center">
                                        {{ country.name }}    
                                    </h1>
                                    <h2 class="text-yellow-700 underline hover:underline-offset-4">
                                    Today's Cases - {{this.VisitedCountriesinfo[country.country_id]["todayCases"]}}
                                    </h2>
                                    <h2 class="text-red-700 underline hover:underline-offset-4">
                                    Today's Death - {{this.VisitedCountriesinfo[country.country_id]["todayDeaths"]}}
                                    </h2>
                                    <h2 class="text-green-700 underline hover:underline-offset-4">
                                    Today's Recovered - {{this.VisitedCountriesinfo[country.country_id]["todayRecovered"]}}
                                    </h2>
                                    <a href="javascript:void(0)"
                                    @click="removeVisitedCountry(country.id)"
                                    class="absolute right-1 top-2"
                                    ><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABmJLR0QA/wD/AP+gvaeTAAACSklEQVRYhdWXTU8TURSGnzMfnX4gRQg1qWkCJmWhJGhCgn9B08REFia6RMOKv+DCn+CSNewNIn/Bj1UXykJjWACJtqgwFNrptHNdDC0kQDud1lHf3U3OnPeZue/cMwN/WXJ28UUpK+64i4g8RjENpAbkc4TwEaVWa5a5nBdxzgFsH6vraI03wMyATC9TEc8o5JKy2wbw77zxPgLzNkTNMu7mRRwNIO64ixGaA9yOO+4zAA0AJU8iNPclvqcPINyMHMAP+QkADEUOcOJphLnSbjZ5/rXEp6MaANOpOC9uZLhi6D330rqXnNd6+ZBRU2djZoKNmQlGTJ3Xe5UwrYI9gbLbYKtaZ6taRwEf7Cp1z+Plzh4A3x2XX24TTRQCTCZiTCZijJvd2wvAds1VnYo2flRYKx/w+bgehJepZIwH42nujXWOVi5uSqAtuD82xEJ2NJA5wEJ2tKt5S6Ey0NJsOsFsOtFPi3BvQdrUcT2PO6k4AJuVGqamceA2owF4dC1NtXkam/nMCAldWN752XOvUFugA7qcAuii6P0E6ANgkPo/AQ4bHvsNr73eb3gcnln3olAhXPm2D8DT7FUAXpXsUOahAVpaK1foeIQOEiB9waQrue6FtSM9TMXAGZhKxniYGcbS5NIaSxPmM8Pkk7HAAIGG0Z/S2WEUbpj3JxvaH6VsRm4vvufJR6laiRxAqdU2QM0yl4FihPZF2/f0AfIiDp5RiAiiiGcUbonU2wAAuaTs2pYxB2oJ4R2DDWYF4S2oJdsy5lr/hf+EfgOVMK4PgBOVqwAAAABJRU5ErkJggg=="/></a>    
                                </div>
                              </div>
                                                               
                              <div class="flex items-center justify-around pt-36">
                               <img src="https://img.icons8.com/color/48/000000/globe--v1.png" />
                               <h1 class="text-3xl">
                                  Covid-19 Worldwide Statistics
                                </h1>   
                              </div>
                              <div class="shadow rounded p-6 flex text-center gap-2">
                                <div class="w-1/2 p-1  bg-gray-700 rounded">
                                                <h2 class="text-yellow-300">
                                                    {{ this.WorldCovid.todayCases }}
                                                    
                                                </h2>
                                                <h2 class="text-yellow-300">    
                                                Today's cases
                                                </h2>
                                            </div>
                                            <div class="w-1/2 p-1   bg-gray-700 rounded">
                                                <h2 class="text-red-700">
                                                    {{ this.WorldCovid.todayDeaths }}
                                                </h2>
                                                <h2 class="text-red-700">
                                                Today's deaths
                                                </h2>
                                            </div>
                                            <div class="w-1/2 p-1 bg-gray-700 rounded">
                                                <h2 class="text-green-300">
                                                    {{ this.WorldCovid.todayRecovered }}
                                                </h2>
                                                <h2 class="text-green-300">
                                                Today's recovered
                                                </h2>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import Select2 from 'vue3-select2-component';

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        Select2
    },
       data() {
        return {
            visitedCountry: '',            
            visitedCountries: [],
            VisitedCountriesinfo: {}, 
            WorldCovid: {},
            map: null
        }
    },
    methods: {
        selectVisitedCountry({id, text}){
            console.log({id, text})
        },
        addVisitedCountry(){
            if(this.visitedCountry !== "")
            {
                axios.post("/api/add-visited-country", 
                {
                    countryID: this.visitedCountry
                }
                ).then((response) => {
                    this.getVisitedCountries(); 
                    this.map.updateChoropleth({ 
                        [response.data.country_code] : '#FF0000'
                        
                    });
                });
            }else{
                console.log("country is not selected from selector!");
            }

        },
        removeVisitedCountry(countryID){
            axios.delete("/api/remove-visited-country/"+countryID)
            .catch(function(error){
                console.log(error);
            }).then((response) => {this.getVisitedCountries();
                this.map.updateChoropleth({
                    [response.data.country_code] : '#ABDDA4'
                });
            });
        },
        getVisitedCountries(){
            axios.get("/api/countries/visited")
                .then((response) => {this.visitedCountries = response.data;
                });
        },
        GetCountryCovidCases(country_id) {            
            axios.get(`https://disease.sh/v3/covid-19/countries/Georgia`).then((response) => (this.VisitedCountriesinfo[country_id] = response.data))
                .catch((error) => console.log(error));
        },
        GetWorldCovidCases() {
            axios.get("https://disease.sh/v3/covid-19/all").then((response) => (this.WorldCovid = response.data))
                .catch((error) => console.log(error));
        },        
        initMap()
        {
        this.map = new Datamap({
            element: document.getElementById("map"),
            projection: 'mercator',
            fills: {
                defaultFill: "#ABDDA4",
                authorHasTraveledTo: "#fa0fa0"
            }
            });
        },
    },

    created(){
        this.GetCountryCovidCases();
        this.GetWorldCovidCases();
        this.getVisitedCountries();
            setTimeout(() => {
                this.initMap();
            }, 500);
    },

};
</script>
