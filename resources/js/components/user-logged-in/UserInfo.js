// UserInfo.js
import axios from 'axios';

export default {
  data() {
    return {
      userName: "",
      userEmail:"",
      image: "",
    };
  },
  created() {
    this.fetchUserInfo();
  },
  methods: {
    fetchUserInfo() {
      const token = localStorage.getItem("token");
      axios
        .get("/api/profile", {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        })
        .then((response) => {
          const userData = response.data.data;
          this.userName = userData.name;
          this.userEmail= userData.email;
          if (userData.image) {
            // Assign the image URL to the correct data property
            this.image = this.getImageUrl(userData.image);
          }
        })
        .catch((error) => {
          console.error("Error fetching user information:", error);
        });
    },
    getImageUrl(imagePath) {
      return `/uploads/${imagePath}`;
    },
  },
};
