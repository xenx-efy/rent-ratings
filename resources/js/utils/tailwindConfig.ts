import resolveConfig from 'tailwindcss/resolveConfig';
import tailwindConfig from '../../../tailwind.config';

const fullConfig = resolveConfig(tailwindConfig);

// TODO: Посмотреть, не ухудшает ли это производительность
// в документации написано что нужно использовать плагин babel для этого
// https://tailwindcss.com/docs/configuration#referencing-in-java-script
export default fullConfig;
