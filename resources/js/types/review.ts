export interface IEvaluationCriteria {
  id: number;
  name: string;
  description: string;
}

export interface IApartment {
  amountOfRooms: null | number;
  floor: null | number;
  id: number;
  number: number;
  rating: string;
  reviewsCount: number;
}

export interface IReview {
  title: string;
  pros: string;
  cons: string;
  adviceToOwner?: string;
  rating: string | number;
  date: string;
}
