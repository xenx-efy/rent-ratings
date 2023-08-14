export interface CreateReview {
  buildingId: number;
  apartmentNumber: number;
  apartmentMeta: {
    floor: number;
    amountOfRooms: number;
  };
  evaluationCriteriaItems: {
    id: number;
    rating: number;
  }[];
  review: {
    title: string;
    pros: string;
    cons: string;
    adviceToOwner: string;
  };
}
