import { reactive } from 'vue';
import { FROM_STEP } from '@/types/enums';
import { router } from '@inertiajs/vue3';

const { INFO, ESTIMATION, REVIEW } = FROM_STEP;

const initFormData = {
  [INFO]: {
    apartmentNumber: null,
    floor: null,
    amountOfRooms: null,
  },
  [REVIEW]: {
    title: '',
    pros: '',
    cons: '',
    adviceToOwner: '',
  },
  [ESTIMATION]: [],
};

export const ReviewFormsData = reactive({
  [INFO]: { ...initFormData[INFO] },
  [REVIEW]: { ...initFormData[REVIEW] },
  [ESTIMATION]: { ...initFormData[ESTIMATION] },
});

export const handleSetReviewPage = (currentStep: FROM_STEP) => {
  const data = ReviewFormsData;

  // Устанавливаем время блокировки (текущее время + 1 час)
  const hour = 3600 * 1000;
  localStorage.setItem('cleanTimer', String(+new Date() + hour));

  return {
    [INFO]: () => {
      localStorage.setItem('floor', data[INFO]?.floor);
      localStorage.setItem('amountOfRooms', data[INFO]?.amountOfRooms);
      localStorage.setItem('apartmentNumber', data[INFO]?.apartmentNumber);
    },
    [REVIEW]: () => {
      localStorage.setItem('title', data[REVIEW]?.title);
      localStorage.setItem('pros', data[REVIEW]?.pros);
      localStorage.setItem('cons', data[REVIEW]?.cons);
      localStorage.setItem('adviceToOwner', data[REVIEW]?.adviceToOwner);
    },
    [ESTIMATION]: () => {
      localStorage.setItem('evaluationCriteriaItems', JSON.stringify(data[ESTIMATION]));
    },
  }[currentStep]();
};

export const submitForm = (houseId: number) => {
  const formData = ReviewFormsData;

  const evaluationCriteriaItems = Object.entries(formData[ESTIMATION]).map(([key, value]) => {
    return {
      id: +key,
      rating: value,
    };
  });

  const data = {
    buildingId: houseId,
    apartmentNumber: formData[INFO].apartmentNumber,
    apartmentMeta: {
      floor: formData[INFO].floor,
      amountOfRooms: formData[INFO].amountOfRooms,
    },
    evaluationCriteriaItems: evaluationCriteriaItems,
    review: formData[REVIEW],
  };

  router.post('/reviews', data, {
    onSuccess: () => {
      formData[INFO] = initFormData[INFO];
      formData[REVIEW] = initFormData[REVIEW];
      formData[ESTIMATION] = initFormData[ESTIMATION];
      localStorage.clear();
    },
  });
};

export const getReviewFormsDataFromLocalstorage = (props?: any) => {
  const cleanTimer = localStorage.getItem('cleanTimer');
  if (+new Date() >= parseInt(cleanTimer)) {
    localStorage.clear();
  }

  ReviewFormsData[INFO].floor = Number(localStorage.getItem('floor')) || '';
  ReviewFormsData[INFO].amountOfRooms = Number(localStorage.getItem('amountOfRooms')) || '';
  ReviewFormsData[INFO].apartmentNumber = Number(localStorage.getItem('apartmentNumber')) || '';

  ReviewFormsData[REVIEW].pros = localStorage.getItem('pros') || '';
  ReviewFormsData[REVIEW].cons = localStorage.getItem('cons') || '';
  ReviewFormsData[REVIEW].title = localStorage.getItem('title') || '';
  ReviewFormsData[REVIEW].adviceToOwner = localStorage.getItem('adviceToOwner') || '';

  props.evaluationCriteria?.forEach((item) => {
    ReviewFormsData[ESTIMATION][item.id] = 0;
  });
};
