export interface CreateReview {
  houseId: number;
  apartmentNumber: number;
  apartmentMeta: {
    floor: number;
    amountOfRooms: number;
  };
  evaluationCriteriaItems: EvaluationCriteriaItems[];
  review: {
    title: string;
    pros: string;
    cons: string;
    adviceToOwner: string;
  };
}

export interface EvaluationCriteriaItems {
  id: number;
  rating: number;
}

export interface EvaluationCriteria {
  id: number;
  name: string;
  description: string;
}
