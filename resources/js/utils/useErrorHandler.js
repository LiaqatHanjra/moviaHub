import { toast } from 'vue3-toastify';

export const handleError = (errorResponse) => {
  if (errorResponse && errorResponse.data && errorResponse.data.errors) {
    const errors = errorResponse.data.errors;

    Object.keys(errors).forEach((field) => {
      if (Array.isArray(errors[field])) {
        errors[field].forEach((message) => {
          toast.error(message);
        });
      } else {
        toast.error(errors[field]);
      }
    });
  } else {
    toast.error("An unexpected error occurred.");
  }
};
