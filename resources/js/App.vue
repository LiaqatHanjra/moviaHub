<template>
    <div>
        <router-view v-slot="{ Component }">
            <component :is="Component" :key="$route.fullPath" />
        </router-view>
    </div>
</template>
