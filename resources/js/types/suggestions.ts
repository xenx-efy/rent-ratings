export interface ISuggestions {
  data: any;
  unrestricted_value: string;
  value: string;
}

export interface ISearchRequest {
  suggestions: ISuggestions[];
}
