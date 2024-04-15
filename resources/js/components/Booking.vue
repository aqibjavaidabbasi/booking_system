<template>
    <div id="app">
        <div id="layout-wrapper">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <h4 class="mb-sm-0 text-center">Book Meeting</h4>
                            </div>
                        </div>
                    </div>
                    <div
                        style="
                            position: fixed;
                            bottom: 20px;
                            right: 20px;
                            z-index: 9999;
                        "
                    >
                        <div
                            class="btn btn-primary position-relative"
                            style="
                                background-color: transparent;
                                border-radius: 50%;
                                width: 50px;
                                height: 50px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                background-color: gray;
                            "
                        >
                            <button
                                type="button"
                                class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode"
                                style="
                                    border-radius: 50%;
                                    width: 80%;
                                    height: 80%;
                                "
                            >
                                <i class="bx bx-moon fs-22 py-2 px-2"></i>
                            </button>
                        </div>
                    </div>
                    <FullCalendar
                        :options="calendarOptions"
                        @dateClick="handleDateClick"
                    />
                </div>
            </div>
        </div>

        <!-- event -->
        <div class="modal fade" id="event" tabindex="-1" :class="{'show d-block' : eventmodal}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventLabel">Add Booking</h5>
                        <button
                            type="button"
                            class="btn-close"
                            @click="closeModal"
                        ></button>
                    </div>
                     <form @submit.prevent="submitbooking">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label">Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" v-model="formData.name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label">Email:</label>
                                        <input type="text" class="form-control transparent-input bg-transparent" id="email" v-model="formData.email" @focus="clearField"  autocomplete="off"/>


                                    </div>
                                </div>


                                    <div class="mb-3">
                                        <label for="eventdate" class="col-form-label">Event Date:</label>
                                        <input type="date" class="form-control transparent-input" id="eventdate" v-model="formData.eventDate" />
                                    </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="starttime" class="col-form-label">Start Time:</label>
                                        <input type="time" class="form-control transparent-input" id="starttime" v-model="formData.startTime" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="endtime" class="col-form-label">End Time:</label>
                                        <input type="time" class="form-control transparent-input" id="endtime" v-model="formData.endTime" />
                                    </div>
                                </div>

                                     <div class="mb-3">
                                        <label for="description" class="col-form-label">Description:</label>
                                        <textarea  class="form-control transparent-input bg-transparent" id="description" v-model="formData.description" @focus="clearField" autocomplete="off"> </textarea>
                                    </div>

                            </div>
                                <!-- Submit button -->

                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-outline-danger"
                                @click="closeModal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-outline-success">
                                Book Meeting
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- event2 -->
        <!-- importent -->
        <div class="app-menu navbar-menu border-end d-none">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <!-- Dark Logo-->
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img
                            src="assets/images/logo-sm.png"
                            alt=""
                            height="22"
                        />
                    </span>
                    <span class="logo-lg">
                        <img
                            src="assets/images/logo-dark.png"
                            alt=""
                            height="17"
                        />
                    </span>
                </a>
                <!-- Light Logo-->
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img
                            src="assets/images/logo-sm.png"
                            alt=""
                            height="22"
                        />
                    </span>
                    <span class="logo-lg">
                        <img
                            src="assets/images/logo-light.png"
                            alt=""
                            height="17"
                        />
                    </span>
                </a>
                <button
                    type="button"
                    class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                    id="vertical-hover"
                >
                    <i class="ri-record-circle-line"></i>
                </button>
            </div>
            <div id="scrollbar">
                <div class="container-fluid">
                    <div id="two-column-menu"></div>
                    <ul class="navbar-nav" id="navbar-nav">
                        <!-- end Dashboard Menu imp-->
                        <li class="nav-item">
                            <a
                                class="nav-link menu-link"
                                href="#sidebarAuth"
                                data-bs-toggle="collapse"
                                role="button"
                                aria-expanded="false"
                                aria-controls="sidebarAuth"
                            >
                                <i class="ri-account-circle-line"></i>
                                <span data-key="t-authentication"
                                    >Authentication</span
                                >
                            </a>
                            <div
                                class="collapse menu-dropdown"
                                id="sidebarAuth"
                            >
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a
                                            href="#sidebarSignIn"
                                            class="nav-link"
                                            data-bs-toggle="collapse"
                                            role="button"
                                            aria-expanded="false"
                                            aria-controls="sidebarSignIn"
                                            data-key="t-signin"
                                        >
                                            Sign In
                                        </a>
                                        <div
                                            class="collapse menu-dropdown"
                                            id="sidebarSignIn"
                                        >
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a
                                                        href="auth-signin-basic.html"
                                                        class="nav-link"
                                                        data-key="t-basic"
                                                    >
                                                        Basic
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a
                                                        href="auth-signin-cover.html"
                                                        class="nav-link"
                                                        data-key="t-cover"
                                                    >
                                                        Cover
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a
                                            href="#sidebarSignUp"
                                            class="nav-link"
                                            data-bs-toggle="collapse"
                                            role="button"
                                            aria-expanded="false"
                                            aria-controls="sidebarSignUp"
                                            data-key="t-signup"
                                        >
                                            Sign Up
                                        </a>
                                        <div
                                            class="collapse menu-dropdown"
                                            id="sidebarSignUp"
                                        >
                                            <ul class="nav nav-sm flex-column">
                                                <li class="nav-item">
                                                    <a
                                                        href="auth-signup-basic.html"
                                                        class="nav-link"
                                                        data-key="t-basic"
                                                    >
                                                        Basic
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a
                                                        href="auth-signup-cover.html"
                                                        class="nav-link"
                                                        data-key="t-cover"
                                                    >
                                                        Cover
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- endimp -->
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- end importent -->
    </div>
</template>

<script>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import axios from "axios";
import timeGridPlugin from '@fullcalendar/timegrid'
import moment from 'moment';
export default {
    components: {
        FullCalendar,
    },
    data() {
        return {
            eventmodal :false,
            // formdata
            formData: {
                name: '',
                email: '',
                description: '',
                eventDate: '',
                startTime: '',
                endTime: ''
            },
            // end formdata
            originalEvents: [], // Store the original event data
            modifiedEvents: [], // Store the modified event data (with time discarded)
            meetings:[],
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin],
                initialView: "dayGridMonth",
                titleFormat: { year: 'numeric', month: 'long', day: 'numeric' },
                weekends: false,
                events: [],
                dateClick: this.handleDateClick,
                eventClassNames: this.getEventClassNames,
                eventContent:this.renderEventContent,
                views: {
                    dayGrid: {
                        // Options apply to dayGridPlugin only
                        eventDisplay: "block", // Show events as blocks in day grid view
                    },
                    week: {
                        // Options apply to the week view
                        // columnHeaderFormat: { weekday: 'long' }, // Remove this line
                    },
                    timeGrid: {
                        // Options apply to the timeGrid views (timeGridWeek and timeGridDay)
                        // columnHeader: true, // Remove this line
                        // columnHeaderFormat: { weekday: 'long' }, // Remove this line
                    },
                },
                headerToolbar: {
                    left: 'today prev next', // Add custom button
                    center: 'title',
                    right: 'dayGridMonth,dayGridWeek,timeGridDay', // Allow switching between different views
                },

            },
            fetchMeetingData: this.fetchMeetingData.bind(this),
        };
    },
    methods: {
        handleDateClick(info) {
            // this.calendarOptions.initialView = 'timeGridWeek';
            console.log("Clicked on date:", info.dateStr);

            if (moment(info.dateStr, 'YYYY-MM-DD', true).isValid()) {
                console.log("Date with time:", moment(info.dateStr).format('HH:mm:ss'));
            } else {

                    let time = moment(info.dateStr).format('HH:mm:ss');

                    let timeend = moment(time, 'HH:mm:ss').add(30, 'minutes').format('HH:mm:ss'); // Add 30 minutes to the start time


                    this.formData.startTime = time ;
                    this.formData.endTime = timeend ;
            }
            let date = moment(info.dateStr).format('YYYY-MM-DD');
             this.formData.eventDate = date;
            console.log(this.formData);
            // Open Bootstrap modal
            this.eventmodal = true;
        },
        closeModal() {
            // Close Bootstrap modal
           this.eventmodal = false;
        },
        getEventClassNames({ event }) {
            if (event.classNames) {
                return event.classNames;
            }
            return [];
        },
        clearField(event) {
            event.target.value = "";
        },
        async fetchMeetingData(token = null) {
            try {
                const urlParts = window.location.pathname.split('/');
                const tokenIndex = urlParts.indexOf('booking') + 1;
                const tokenFromUrl = tokenIndex > 0 ? urlParts[tokenIndex] : null;

                let apiUrl = "/api/get-meetings-data";
                if (tokenFromUrl !== null) {
                    apiUrl += `/${tokenFromUrl}`;
                    const response = await axios.get(apiUrl);

                    // Process original event data
                    this.originalEvents = response.data;

                    // Process modified event data (with time discarded)
                    this.modifiedEvents = response.data.map(event => ({
                        start: event.start.substring(0, 10),
                        end: event.end.substring(0, 10),
                        'title':event.title,
                        color: event.color || '#378006',
                    }));

                    // Set default events to modifiedEvents
                    this.calendarOptions.events = this.modifiedEvents;
                } else {
                    console.log('Token does not exist in the URL');
                }
            } catch (error) {
                console.error('Error fetching meeting data:', error);
            }
        },
        renderEventContent(eventInfo) {
         // Create a custom event content layout
            return {
                html: `
                <div style="display: flex; align-items: center;color:var(--vz-heading-color)">
                    <span style="height: 10px; width: 10px; border-radius: 5px; display: inline-block; margin-right: 5px;background-color: ${eventInfo.event.backgroundColor}"></span>
                    ${eventInfo.event.title}
                </div>
                `
            };
            },
            //
            async submitbooking() {
            try {
                const response = await axios.post("/api/store-booking", this.formData);
                console.log(response.data.valid);
                    this.eventmodal = false;
                this.fetchMeetingData();


            } catch (error) {
                this.eventmodal = false;
                this.fetchMeetingData();
                console.error("Error submitting booking:", error);
            }
        }
    },
    mounted() {
        this.fetchMeetingData(); // Call fetchMeetingData directly
         const prevButton = document.querySelector('.fc-prev-button');
        const nextButton = document.querySelector('.fc-next-button');
        const todayButton = document.querySelector('.fc-today-button');
        const dayGridMonthButton = document.querySelector('.fc-dayGridMonth-button');
        const dayGridWeekButton = document.querySelector('.fc-dayGridWeek-button');
        const timeGridDayButton = document.querySelector('.fc-timeGridDay-button');

        prevButton.addEventListener('click', () => {
            // console.log('Clicked on Previous button');
        });

        nextButton.addEventListener('click', () => {
            // console.log('Clicked on Next button');
        });

        todayButton.addEventListener('click', () => {
            // console.log('Clicked on Today button');
        });

        dayGridMonthButton.addEventListener('click', () => {
            this.calendarOptions.events = this.modifiedEvents;
            // console.log('Clicked on Day Grid Month button');
        });

        dayGridWeekButton.addEventListener('click', () => {
            this.calendarOptions.events = this.modifiedEvents;
            // console.log('Clicked on Day Grid Week button');
        });

            timeGridDayButton.addEventListener('click', () => {
            this.calendarOptions.events = this.originalEvents;
            // console.log('Clicked on Time Grid Day button',this.originalEvents);
        });
    },
};
</script>

<style>

.fc-h-event .fc-event-title {

    max-width: 70% !important;
}
.fc-scrollgrid-sync-table{
    height: 200px!important;
}
.fc-scrollgrid-sync-table td{
    height: 200px!important;
}
.fc-event-title, .fc-event-title-container {
    background: none !important; /* Use !important to override any existing styles */
    color: --vz-heading-color; /* Change color as needed */
}
.fc-h-event{
        background: none !important; /* Use !important to override any existing styles */
    color: var(--vz-heading-color); /* Change color as needed */
}
</style>
