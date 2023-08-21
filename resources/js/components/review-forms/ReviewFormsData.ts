import { ref } from 'vue';
import { FROM_STEP } from '@/types/enums';
import type { CreateReview, EvaluationCriteriaItems } from '@/types/review';
import useFetch from '@/utils/useFetch';

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

export const ReviewFormsData = ref({
  [INFO]: { ...initFormData[INFO] },
  [REVIEW]: { ...initFormData[REVIEW] },
  [ESTIMATION]: { ...initFormData[ESTIMATION] },
});

export const handleSetReviewPage = (currentStep: FROM_STEP) => {
  const data = ReviewFormsData.value;

  // Устанавливаем время блокировки (текущее время + 1 час)
  localStorage.setItem('cleanTimer', String(+new Date() + 3600 * 1000));

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
      const evaluationCriteriaItems = [];
      Object.entries(data[ESTIMATION]).forEach(([key, value]) => {
        evaluationCriteriaItems.push({
          id: key,
          rating: value,
        });
      });

      localStorage.setItem('evaluationCriteriaItems', JSON.stringify(evaluationCriteriaItems));
    },
  }[currentStep]();
};

export const submitForm = (houseId: number) => {
  const data = ReviewFormsData.value;

  const body: CreateReview = {
    houseId: houseId,
    apartmentNumber: data[INFO].apartmentNumber,
    apartmentMeta: {
      floor: data[INFO].floor,
      amountOfRooms: data[INFO].amountOfRooms,
    },
    evaluationCriteriaItems: data[ESTIMATION],
    review: data[REVIEW],
  };

  useFetch('POST', '/reviews', body).then(() => {
    data[INFO] = initFormData[INFO];
    data[REVIEW] = initFormData[REVIEW];
    data[ESTIMATION] = initFormData[ESTIMATION];
    localStorage.clear();
  });
};

export const getReviewFormsDataFromLocalstorage = (props: any) => {
  const cleanTimer = localStorage.getItem('cleanTimer');
  if (+new Date() >= parseInt(cleanTimer)) {
    localStorage.clear();
  }

  ReviewFormsData.value[INFO].floor = Number(localStorage.getItem('floor')) || '';
  ReviewFormsData.value[INFO].amountOfRooms = Number(localStorage.getItem('amountOfRooms')) || '';
  ReviewFormsData.value[INFO].apartmentNumber = Number(localStorage.getItem('apartmentNumber')) || '';

  ReviewFormsData.value[REVIEW].pros = localStorage.getItem('pros') || '';
  ReviewFormsData.value[REVIEW].cons = localStorage.getItem('cons') || '';
  ReviewFormsData.value[REVIEW].title = localStorage.getItem('title') || '';
  ReviewFormsData.value[REVIEW].adviceToOwner = localStorage.getItem('adviceToOwner') || '';

  const evaluationCriteriaItems = localStorage.getItem('evaluationCriteriaItems');
  if (evaluationCriteriaItems) {
    const items = JSON.parse(evaluationCriteriaItems);
    items?.forEach((item: EvaluationCriteriaItems) => {
      ReviewFormsData.value[ESTIMATION][item.id] = item.rating;
    });
  } else {
    props.evaluationCriteria?.forEach((item) => {
      ReviewFormsData.value[ESTIMATION][item.id] = 0;
    });
  }
};
